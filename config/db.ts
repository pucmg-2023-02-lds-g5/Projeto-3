import { Sequelize } from 'sequelize-typescript';

const sequelize = new Sequelize({
  database: 'projeto3db',
  username: 'root',
  password: 'bestevents123',
  host: 'localhost',
  dialect: 'mysql',
  models: [__dirname + '/data'],
});

export default sequelize;
