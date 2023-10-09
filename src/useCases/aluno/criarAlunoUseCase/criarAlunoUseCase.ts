import { Aluno } from "../../../entities/Aluno";
import { Instituicao } from "../../../entities/Instituicao";
import { IAlunoRepository } from "../../../repository/alunoRepository/IAlunoRepository";
import { ICriarAlunoDTO } from "./IcriarAlunoDTO";

export class CriarAlunoUseCase {
    private alunoRepository: IAlunoRepository;

    public constructor(alunoRepository: IAlunoRepository){
        this.alunoRepository = alunoRepository;
    }

    public async execute(data: ICriarAlunoDTO){
        const verificarAluno = await this.alunoRepository.encontrarPeloCpf(data.cpf);

        if(verificarAluno){
            throw new Error("Aluno já cadastrado");
        }

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

        this.alunoRepository.criarNovo(aluno);
        
    }
}