import { DataTypes, Model } from "sequelize";
import sequelize from "../config/db";

export class AlunoModel extends Model {
    declare nome: string;
    declare rg: string;
    declare cpf: string;
    declare email: string;
    declare endereco: string; 
    declare instituicao: string; 
    declare saldoDeMoedas: number;
    declare curso: string;
}

AlunoModel.init(
    {
        nome: {
            type: new DataTypes.STRING(128),
            allowNull: false,
        },
        rg: {
            type: new DataTypes.STRING(20),
            allowNull: false,
        },
        cpf: {
            type: new DataTypes.STRING(14),
            allowNull: false,
        },
        email: {
            type: new DataTypes.STRING(128),
            allowNull: false,
        },
        endereco: {
            type: new DataTypes.STRING(255),
            allowNull: false,
        },
        instituicao: {
            type: new DataTypes.STRING(128),
            allowNull: false,
        },
        saldoDeMoedas: {
            type: new DataTypes.DOUBLE,
            allowNull: false,
        },
        curso: {
            type: new DataTypes.STRING(128),
            allowNull: false,
        },
    },
    {
        tableName: 'alunos', // O nome da tabela no seu banco de dados
        sequelize, // passando a instância `sequelize` é obrigatório
    }
);
