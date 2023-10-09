import { Request, Response, Router } from "express";
import { criarEmpresaController } from "../useCases/empresa/criarEmpresaUseCase";



const router = Router();

router.post("/criar", (req: Request, res: Response) => {
    return criarEmpresaController.handle(req, res);
});


export {router};