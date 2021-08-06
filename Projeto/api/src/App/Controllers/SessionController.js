import jwt from 'jsonwebtoken';

import User from '../Models/User';

class SessionController {
    async login(request, response) {
        try {
            const { matricula, password } = request.body;
            const user = await User.findOne({
                where: {
                    matricula,
                    password,
                },
            });

            if (user) {
                const token = jwt.sign({
                    user_id: user.id
                },
                    process.env.SECRET,
                    { expiresIn: 3600, }
                );
                return response.json({ auth: true, token, user });
            }
            return response.status(401).json({ erro: 'Usuário não encontrado.' })
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    verifyJwt(request, response, next) {
        const { token } = request.headers;
        jwt.verify(token, process.env.SECRET, (err, decoded) => {
            if (err) {
                return response.status(400).end();
            }
            request.user_id = decoded.user_id;
            next();
        });
    } // Verifica se as rotas está autenticada.
}

export default new SessionController;