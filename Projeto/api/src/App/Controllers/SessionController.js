import jwt from 'jsonwebtoken';

class SessionController {
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