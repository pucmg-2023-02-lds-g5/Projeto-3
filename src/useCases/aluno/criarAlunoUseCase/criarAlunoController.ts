import { Request, Response } from "express";
import { CriarAlunoUseCase } from "./CriarAlunoUseCase";

export class CriarAlunoController {
    private criarAlunoUseCase: CriarAlunoUseCase;

    public constructor(criarAlunoUseCase: CriarAlunoUseCase){
        this.criarAlunoUseCase = criarAlunoUseCase;
    }

    public async handle(req: Request, res: Response){
        try {
            this.criarAlunoUseCase.execute(req.body);

            return res.json({msg: "Aluno registrado"});
        } catch (error) {
            return res.status(400).json({msg: "Erro inexperado"});
        }
    }
}