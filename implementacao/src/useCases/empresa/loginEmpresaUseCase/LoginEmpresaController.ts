import { Request, Response } from "express";
import { LoginEmpresaUseCase } from "./LoginEmpresaUseCase";

export class LoginEmpresaController {
    public loginEmpresaUseCase: LoginEmpresaUseCase;

    public constructor(loginEmpresaUseCase: LoginEmpresaUseCase){
        this.loginEmpresaUseCase = loginEmpresaUseCase;
    }

    public async handle(req: Request, res: Response){
        try {
            
            const auth = await this.loginEmpresaUseCase.execute(req.body);

            return res.json({msg: "Login efetuado com sucesso.", authorization: auth});
        } catch (error: any) {
            return res.status(400).json({msg: error.message});
        }
    }
}