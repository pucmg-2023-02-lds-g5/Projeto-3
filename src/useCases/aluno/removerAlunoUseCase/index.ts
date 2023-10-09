import { IAlunoRepository } from "../../../repository/alunoRepository/IAlunoRepository";
import { MySQLAlunoRepository } from "../../../repository/alunoRepository/implementation/MySQLAlunoRepository";
import { RemoverAlunoController } from "./RemoverAlunoController";
import { RemoverAlunoUseCase } from "./RemoverAlunoUseCase";


const alunoRepository: IAlunoRepository = new MySQLAlunoRepository();

const removerAlunoUseCase = new RemoverAlunoUseCase(alunoRepository);

const removerAlunoController = new RemoverAlunoController(removerAlunoUseCase);

export {removerAlunoUseCase, removerAlunoController};
