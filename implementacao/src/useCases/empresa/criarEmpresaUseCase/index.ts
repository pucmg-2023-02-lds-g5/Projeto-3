import { IEmpresaRepository } from "../../../repository/empresaRepository/IEmpresaRepository";
import { MySQLEmpresaRepository } from "../../../repository/empresaRepository/implementation/MySQLEmpresaRepository";
import { CriarEmpresaController } from "./CriarEmpresaController";
import { CriarEmpresaUseCase } from "./CriarEmpresaUseCase";

const empresaRepository: IEmpresaRepository = new MySQLEmpresaRepository();

const criarEmpresaUseCase = new CriarEmpresaUseCase(empresaRepository);

const criarEmpresaController = new CriarEmpresaController(criarEmpresaUseCase);

export {criarEmpresaUseCase, criarEmpresaController};