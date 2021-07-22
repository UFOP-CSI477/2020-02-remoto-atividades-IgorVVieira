import { Model, DataTypes } from 'sequelize';

class User extends Model {
    static init(connection) {
        super.init({
            nome: DataTypes.STRING,
            email: DataTypes.STRING,
            matricula: DataTypes.STRING,
            password: DataTypes.STRING,
        }, {
            sequelize: connection,
        });
    }
}

export default User;
