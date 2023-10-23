import { Aluno } from "../../../entities/Aluno";
import { Instituicao } from "../../../entities/Instituicao";
import { IAlunoRepository } from "../../../repository/alunoRepository/IAlunoRepository";
import { IRemoverAlunoDTO } from "./IRemoverAlunoDTO";

export class RemoverAlunoUseCase {
    private alunoRepository: IAlunoRepository

    public constructor(alunoRepository: IAlunoRepository){
        this.alunoRepository = alunoRepository;
    }

    public async execute(data: IRemoverAlunoDTO){

        const {nome, rg, cpf, email, endereco, instituicao, curso} = data;
        const aluno = new Aluno(
            nome,
            rg,
            cpf,
            email,
            endereco,
            new Instituicao(instituicao),
            0,
            curso,
            []
        );

        this.alunoRepository.remover(aluno);
    }

    
}