import { DataTypes, Model } from "sequelize";
import sequelize from "../config/db";

export class InstituicaoModel extends Model {
    declare nome: string;
}

InstituicaoModel.init(
    {
        nome: {
            type: new DataTypes.STRING(128),
            allowNull: false,
            unique: true
        }
    },
    {
        tableName: 'instituicoes',
        sequelize,
    }
)