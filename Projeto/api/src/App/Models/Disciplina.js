import { Model, DataTypes } from 'sequelize';

class Disciplina extends Model {
    static init(connection) {
        super.init({
            nome: DataTypes.STRING,
            codigo: DataTypes.STRING,
            periodo: DataTypes.INTEGER,
        }, {
            sequelize: connection,
        });
    }
}

export default Disciplina;