import { Request, Response } from "express";
import { RemoverEmpresaUseCase } from "./RemoverEmpresaUseCase";


export class RemoverEmpresaController {
    private removerEmpresaUseCase: RemoverEmpresaUseCase;  
    
    public constructor(removerEmpresaUseCase: RemoverEmpresaUseCase) {
        this.removerEmpresaUseCase = removerEmpresaUseCase;
    }

    public async handle(req: Request, res: Response){
        try {
            const data = req.body;

            this.removerEmpresaUseCase.execute(data);

            return res.status(200).json({msg: "Empresa removida com sucesso"});
        } catch (error: any) {
            return res.json({msg: error.message})
        }
    }
}
