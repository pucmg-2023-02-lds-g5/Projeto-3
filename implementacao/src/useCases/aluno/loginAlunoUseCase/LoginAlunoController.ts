import { Request, Response } from "express";
import { LoginAlunoUseCase } from "./LoginAlunoUseCase";

export class LoginAlunoController {
    private loginAlunoUseCase: LoginAlunoUseCase;

    public constructor(loginAlunoUseCase: LoginAlunoUseCase){
        this.loginAlunoUseCase = loginAlunoUseCase;
    }

    public async handle(req: Request, res: Response){
        try {
            

            const auth = await this.loginAlunoUseCase.execute(req.body);

            return res.json({msg: "Login efetuado com sucesso.", authorization: auth});
        } catch (error: any) {
            return res.status(400).json({msg: error.message});
        }
    }
}