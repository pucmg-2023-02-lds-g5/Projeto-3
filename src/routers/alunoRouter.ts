import { Request, Response, Router } from "express";
import { criarAlunoController } from "../useCases/aluno/criarAlunoUseCase";
import { removerAlunoController } from "../useCases/aluno/removerAlunoUseCase";
import { loginAlunoController } from "../useCases/aluno/loginAlunoUseCase";


const router = Router();

router.post("/criar", (req: Request, res: Response) => {
    return criarAlunoController.handle(req, res);
});

router.post("/remover", (req: Request, res: Response) => {
    return removerAlunoController.handle(req, res);
});

router.post("/login", (req: Request, res: Response) => {
    return loginAlunoController.handle(req, res);
})

export {router};