'use strict';

const DataTypes = require('sequelize').DataTypes;

module.exports = {
  up: async (queryInterface, Sequelize) => {
    return await queryInterface.createTable('provas',
      {
        id: {
          type: DataTypes.INTEGER,
          primaryKey: true,
          allowNull: false,
        },
        nome: {
          type: DataTypes.TEXT,
          allowNull: false,
        },
        observacao: {
          type: DataTypes.TEXT,
          allowNull: true,
        },
        data: {
          type: DataTypes.DATE,
          allowNull: false,
        },
        valor: {
          type: DataTypes.DECIMAL(5, 2),
          allowNull: false,
        },
        resultado: {
          type: DataTypes.DECIMAL(5, 2),
          allowNull: true,
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
        deleted_at: {
          type: DataTypes.DATE,
          allowNull: false,
        },
      });
  },
  down: async (queryInterface, Sequelize) => {
    return await queryInterface.dropTable('provas');
  }
}

