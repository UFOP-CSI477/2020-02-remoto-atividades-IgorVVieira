import User from "../Models/User";

class UserController {
    async index(request, response) {
        try {
            const user = await User.findAll();
            return response.json(user);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    async show(reqest, response) { }

    async store(request, response) { }

    async update(request, response) { }

    async destroy(request, response) { }
}

export default new UserController;