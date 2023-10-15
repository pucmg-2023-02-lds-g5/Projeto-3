import { Sequelize } from 'sequelize-typescript';

const sequelize = new Sequelize({
	dialect: 'sqlite',
	host: 'db.sqlite'
});

export default sequelize;
