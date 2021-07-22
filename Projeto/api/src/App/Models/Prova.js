import { Model, DataTypes } from 'sequelize';

class Prova extends Model {
    static init(connection) {
        super.init({
            nome: DataTypes.TEXT,
            observacao: DataTypes.TEXT,
            data: DataTypes.DATE,
            valor: DataTypes.DECIMAL,
            resultado: DataTypes.DECIMAL,
            user_id: DataTypes.INTEGER,
            curso_id: DataTypes.INTEGER,
        }, {
            sequelize: connection,
        });
    }
}

export default Prova;