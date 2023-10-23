import { Request, Response } from "express";
import { CriarEmpresaUseCase } from "./CriarEmpresaUseCase";

export class CriarEmpresaController {
    private criarEmpresaUseCase: CriarEmpresaUseCase;

    public constructor(criarEmpresaUseCase: CriarEmpresaUseCase){
        this.criarEmpresaUseCase = criarEmpresaUseCase;
    }

    public async handle(req: Request, res: Response){
        try {
            this.criarEmpresaUseCase.execute(req.body);

            return res.json({msg: "Empresa cadastrada com sucesso."})
        } catch (error: any) {
            return res.json({msg: error.message})
        }
    }
}