import { IAlunoRepository } from "../../../repository/alunoRepository/IAlunoRepository";
import { MySQLAlunoRepository } from "../../../repository/alunoRepository/implementation/MySQLAlunoRepository";
import { LoginAlunoController } from "./LoginAlunoController";
import { LoginAlunoUseCase } from "./LoginAlunoUseCase";

const alunoRepository: IAlunoRepository = new MySQLAlunoRepository();

const loginAlunoUseCase: LoginAlunoUseCase = new LoginAlunoUseCase(alunoRepository);

const loginAlunoController: LoginAlunoController = new LoginAlunoController(loginAlunoUseCase);

export {loginAlunoUseCase, loginAlunoController};