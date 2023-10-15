import { IEmpresaRepository } from "../../../repository/empresaRepository/IEmpresaRepository";
import { MySQLEmpresaRepository } from "../../../repository/empresaRepository/implementation/MySQLEmpresaRepository";
import { RemoverEmpresaController } from "./RemoverEmpresaController";
import { RemoverEmpresaUseCase } from "./RemoverEmpresaUseCase";

const empresaRepository: IEmpresaRepository = new MySQLEmpresaRepository();

const removerEmpresaUseCase: RemoverEmpresaUseCase = new RemoverEmpresaUseCase(empresaRepository);

const removerEmpresaController: RemoverEmpresaController = new RemoverEmpresaController(removerEmpresaUseCase);

export {removerEmpresaUseCase, removerEmpresaController};