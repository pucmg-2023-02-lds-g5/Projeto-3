import { IAlunoRepository } from "../../../repository/alunoRepository/IAlunoRepository";
import { MySQLAlunoRepository } from "../../../repository/alunoRepository/implementation/MySQLAlunoRepository";
import { CriarAlunoController } from "./criarAlunoController";
import { CriarAlunoUseCase } from "./criarAlunoUseCase";

const alunoRepository: IAlunoRepository = new MySQLAlunoRepository();

const criarAlunoUseCase = new CriarAlunoUseCase(alunoRepository);

const criarAlunoController = new CriarAlunoController(criarAlunoUseCase);

export {criarAlunoUseCase, criarAlunoController};
