import { DataTypes, Model } from "sequelize";
import sequelize from "../config/db";
import { InstituicaoModel } from "./InstituicaoModel";

export class AlunoModel extends Model {
    declare nome: string;
    declare rg: string;
    declare cpf: string;
    declare email: string;
    declare senha: string;
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
            primaryKey: true
        },
        email: {
            type: new DataTypes.STRING(128),
            allowNull: false,
        },
        senha: {
            type: new DataTypes.STRING(128),
            allowNull: false
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
        tableName: 'alunos',
        sequelize,
    }
);

AlunoModel.belongsTo(InstituicaoModel, {targetKey: "id"});
