import User from '../Models/User';
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

    async show(request, response) {
        try {
            const { id } = request.params;
            const user = await User.findByPk(id);

            if (!user) {
                return response.status(400).json({ error: 'User does not exist' })
            }
            return response.json(user);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
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

    async update(request, response) {
        try {
            const { id } = request.params;
            const { nome, email, matricula, senha } = request.body;

            const user = await User.update(
                {
                    nome,
                    email,
                    matricula,
                    senha,
                },
                {
                    returning: true,
                    where: {
                        id,
                    },
                });

            if (!user) {
                return response.status(400).json({ error: 'User not found' });
            }
            return response.jsn(user);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    async destroy(request, response) {
        try {
            const { id } = request.params;

            const user = await User.destroy({
                where: {
                    id,
                },
            });

            if (!user) {
                return response.status(400).json({ error: 'User not found' });
            }
            return response.status(200);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }
}

export default new UserController;