import { DataTypes, Model } from "sequelize";
import sequelize from "../config/db";

export class EmpresaModel extends Model {
    declare nome: string;
    declare email: string;
    declare cnpj: string;
    declare senha: string;
}

EmpresaModel.init(
    {
        nome: {
            type: new DataTypes.STRING(128),
            allowNull: false,
        },
        email: {
            type: new DataTypes.STRING(128),
            allowNull: false,
        },
        cnpj: {
            type: new DataTypes.STRING(14),
            allowNull: false,
            unique: true
        },
        senha: {
            type: new DataTypes.STRING(128),
            allowNull: false,
        },
    },
    {
        tableName: 'empresas',
        sequelize,
    }
);
