import Prova from '../Models/Prova';

class ProvaController {
    async index(request, response) {
        try {
            const { user_id, prova_id } = request.params;

            const provas = await Prova.findAll({
                where: {
                    user_id,
                    prova_id,
                }
            });

            return response.json(provas);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    static show(request, response) {
        try {
            const { id } = request.params;
            const prova = await Prova.findByPk(id);

            return response.json(prova);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    async store(request, response) {
        try {
            const { nome, observacao, data, valor, curso_id } = request.body;
            const { user_id } = request.params;

            const prova = await Prova.create({
                nome,
                observacao,
                data,
                valor,
                curso_id,
            });

            return response.json(prova);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    async update(request, response) {
        try {
            const { nome, observacao, data, valor, resultado } = request.body;
            const { id } = request.params;

            const prova = await Prova.update(
                {
                    nome,
                    observacao,
                    data,
                    valor,
                    resultado,
                },
                {
                    returning: true,
                    where: {
                        id,
                    },
                });

            return response.json(prova);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }

    async delete(request, response) {
        try {
            const { id } = request.params;

            const prova = await Prova.destroy({
                where: {
                    id,
                },
            });

            if (!prova) {
                return response.status(400).json({ error: 'Prova not found' });
            }
            return response.status(200);
        } catch (error) {
            return response.status(500).json({ 'Erro': error });
        }
    }
}

export default new ProvaController;