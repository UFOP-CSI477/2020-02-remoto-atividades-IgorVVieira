import { Model, DataTypes } from 'sequelize';

class Mensagem extends Model {
    static init(connection) {
        super.init({
            mensagem: DataTypes.TEXT,
            user_id: DataTypes.INTEGER,
            curso_id: DataTypes.INTEGER,
        }, {
            sequelize: connection,
        });
    }
}

export default Mensagem;