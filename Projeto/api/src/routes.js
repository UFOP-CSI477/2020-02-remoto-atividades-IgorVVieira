import { Router } from "express";
import 'express-group-routes';

import SessionController from "./App/Controllers/SessionController";
import UserController from "./App/Controllers/UserController";
import DisciplinaController from './App/Controllers/DisciplinaController';
import ProvaController from "./App/Controllers/ProvaController";
import MensagemController from "./App/Controllers/MensagemController";

const routes = Router();

route.post('/login', UserController.login);

routes.group('/users', (route) => {
    route.get('/', SessionController.verifyJwt, UserController.index);
    route.post('/', UserController.store);
});

routes.group('/disciplinas', (route) => { });

routes.group('/provas', (route) => { });

routes.group('/mensagens', (route) => { });

export default routes;