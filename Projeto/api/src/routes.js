import { Router } from "express";
import 'express-group-routes';

import UserController from "./App/Controllers/UserController";
import DisciplinaController from './App/Controllers/DisciplinaController';
import ProvaController from "./App/Controllers/ProvaController";
import MensagemController from "./App/Controllers/MensagemController";

const routes = Router();

routes.group('/users', (route) => {
    route.get('/', UserController.index);
});

routes.group('/disciplinas', (route) => { });

routes.group('/provas', (route) => { });

routes.group('/mensagens', (route) => { });

export default routes;