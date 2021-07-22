import Sequelize from 'sequelize';
import dbConfig from '../config/database';

import User from '../App/Models/User';
import Disciplina from '../App/Models/Disciplina';
import Prova from '../App/Models/Prova';
import Mensagem from '../App/Models/Mensagem';

const connection = new Sequelize(dbConfig);
User.init(connection);

export default connection;