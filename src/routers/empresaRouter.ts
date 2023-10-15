import { Request, Response, Router } from "express";
import { criarEmpresaController } from "../useCases/empresa/criarEmpresaUseCase";
import { removerEmpresaController } from "../useCases/empresa/removerEmpresaUseCase";
import { loginEmpresaController } from "../useCases/empresa/loginEmpresaUseCase";



const router = Router();

router.post("/criar", (req: Request, res: Response) => {
    return criarEmpresaController.handle(req, res);
});

router.post("/remover", (req: Request, res: Response) => {
    return removerEmpresaController.handle(req, res);
})

router.post("/login", (req: Request, res: Response) => {
    return loginEmpresaController.handle(req, res);
})


export {router};