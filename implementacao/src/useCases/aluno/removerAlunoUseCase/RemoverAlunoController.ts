import { Request, Response } from "express";
import { IAlunoRepository } from "../../../repository/alunoRepository/IAlunoRepository";
import { RemoverAlunoUseCase } from "./RemoverAlunoUseCase";

export class RemoverAlunoController {
    private removerAlunoUseCase: RemoverAlunoUseCase;

    public constructor(removerAlunoUseCase: RemoverAlunoUseCase){
        this.removerAlunoUseCase = removerAlunoUseCase;
    }

    public async handle(req: Request, res: Response){
        try {
            this.removerAlunoUseCase.execute(req.body);

            return res.json({msg: "Aluno removido com sucesso."});
        } catch (error) {
            return res.status(400).json({msg: "Erro inexperado"});
        }
    }
       
}