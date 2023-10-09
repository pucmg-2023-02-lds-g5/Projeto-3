import { Request, Response, Router } from "express";
import { criarAlunoController } from "../useCases/aluno/criarAlunoUseCase";
import { removerAlunoController } from "../useCases/aluno/removerAlunoUseCase";


const router = Router();

router.post("/criar", (req: Request, res: Response) => {
    return criarAlunoController.handle(req, res);
});

router.post("/remover", (req: Request, res: Response) => {
    return removerAlunoController.handle(req, res);
});

export {router};