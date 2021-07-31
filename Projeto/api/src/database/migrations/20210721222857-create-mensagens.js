'use strict';

const DataTypes = require('sequelize').DataTypes;

module.exports = {
  up: async (queryInterface, Sequelize) => {
    return await queryInterface.createTable('mensagens',
      {
        id: {
          type: DataTypes.INTEGER,
          primaryKey: true,
          autoIncrement: true,
          allowNull: false,
        },
        mensagem: {
          type: DataTypes.TEXT,
          allowNull: false,
        },
        user_id: {
          type: DataTypes.INTEGER,
          references: { model: 'users', key: 'id' },
          onUpdate: 'CASCADE',
          onDelete: 'CASCADE',
          allowNull: false,
        },
        curso_id: {
          type: DataTypes.INTEGER,
          references: { model: 'disciplinas', key: 'id' },
          onUpdate: 'CASCADE',
          onDelete: 'CASCADE',
          allowNull: false,
        },
        created_at: {
          type: DataTypes.DATE,
          allowNull: false,
        },
        updated_at: {
          type: DataTypes.DATE,
          allowNull: false,
        },
      });
  },
  down: async (queryInterface, Sequelize) => {
    return await queryInterface.dropTable('mensagens');
  }
}

