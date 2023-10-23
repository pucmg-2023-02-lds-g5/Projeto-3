import { sign } from "jsonwebtoken";
import { IAlunoRepository } from "../../../repository/alunoRepository/IAlunoRepository";
import { ILoginAlunoDTO } from "./ILoginAlunoDTO";
import config from "config";

export class LoginAlunoUseCase {
    private alunoRepository: IAlunoRepository;

    public constructor(alunoRepository: IAlunoRepository){
        this.alunoRepository = alunoRepository;
    }

    public async execute(data: ILoginAlunoDTO): Promise<string>{


        const verificarAluno = await this.alunoRepository.encontrarPeloEmail(data.email);

        if(!verificarAluno){
            throw new Error("Email ou senha incorreto");
        }

        if(verificarAluno.getSenha() !== data.senha){
            throw new Error("Email ou senha incorreto");
        }

        const authorization = sign({cpf: verificarAluno.getCpf()}, config.get<string>("jwtSecret"))

        return authorization;

    }
}