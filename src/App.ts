import express, { Request, Response } from 'express';
import config from "config";
import sequelize from '../config/db';
import { router as alunoRouter } from './routers/alunoRouter';
import { router as empresaRouter } from './routers/empresaRouter';
import cors from "cors";

const app = express();
app.use(cors());

app.use(express.json());

app.get('/', (req: Request, res: Response) => {
    res.send('Hello World!');
});

app.use("/aluno", alunoRouter);

app.use("/empresa", empresaRouter);


const PORT = config.get<number>("port");
const env = config.get<string>("enviroment");

app.listen(PORT, async () => {
    try {
        await sequelize.authenticate();
        await sequelize.sync();
        console.log("DB connected");
    } catch (error) {
        console.error("Error DB");
        console.error(error)
    }

    console.log(`Server running on ${env} enviroment`);
    console.log(`Server Running on ${PORT}`);
});
