import User from "../Models/User";
import jwt from 'jsonwebtoken';
import bcrypt from 'bcrypt';

class UserController {
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

    async index(request, response) {
        try {
            const user = await User.findAll();
            return response.json(user);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    async show(reqest, response) {
        try {
        } catch (error) {

        }
    }

    async store(request, response) {
        try {
            const { nome, email, matricula, password } = request.body;
            const user = await User.create({
                nome,
                email,
                matricula,
                password,
            });

            return response.json(user);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    async update(request, response) { }

    async destroy(request, response) { }
}

export default new UserController;