import { IEmpresaRepository } from "../../../repository/empresaRepository/IEmpresaRepository";
import { MySQLEmpresaRepository } from "../../../repository/empresaRepository/implementation/MySQLEmpresaRepository";
import { LoginEmpresaController } from "./LoginEmpresaController";
import { LoginEmpresaUseCase } from "./LoginEmpresaUseCase";

const empresaRepository: IEmpresaRepository = new MySQLEmpresaRepository();

const loginEmpresaUseCase: LoginEmpresaUseCase = new LoginEmpresaUseCase(empresaRepository);

const loginEmpresaController: LoginEmpresaController = new LoginEmpresaController(loginEmpresaUseCase);

export {loginEmpresaUseCase, loginEmpresaController};