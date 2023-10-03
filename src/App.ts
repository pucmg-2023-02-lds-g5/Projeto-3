import express, { Request, Response } from 'express';
import config from "config";

const app = express();

app.use(express.json());

app.get('/', (req: Request, res: Response) => {
    res.send('Hello World!');
});


const PORT = config.get<string>("port");
const env = config.get<string>("enviroment");
app.listen(PORT, () => {
    console.log(`Server running on ${env} enviroment`);
    console.log(`Server Running on ${PORT}`);
});
