import { Aluno } from "../../../entities/Aluno";
import { Instituicao } from "../../../entities/Instituicao";
import { AlunoModel } from "../../../models/AlunoModel";
import { IAlunoRepository } from "../IAlunoRepository";

export class MySQLAlunoRepository implements IAlunoRepository {

    async encontrarPeloCpf(cpf: string): Promise<Aluno | null> {
        // throw new Error("Method not implemented.");
        const verificarAluno = await AlunoModel.findOne({ where: { cpf: cpf } });

        if(verificarAluno){
            return new Aluno(
                verificarAluno.nome,
                verificarAluno.rg,
                verificarAluno.cpf,
                verificarAluno.email,
                verificarAluno.senha,
                verificarAluno.endereco,
                new Instituicao(verificarAluno.instituicao),
                verificarAluno.saldoDeMoedas,
                verificarAluno.curso,
                []
            )
        }

        return null;

    }

    async criarNovo(aluno: Aluno): Promise<void> {
        // throw new Error("Method not implemented.");

        const instituicao = aluno.getInstituicao();

        await AlunoModel.create({
            nome: aluno.getNome(),
            rg: aluno.getRg(),
            cpf: aluno.getCpf(),
            email: aluno.getEmail(),
            senha: aluno.getSenha(),
            endereco: aluno.getEndereco(),
            instituicao: instituicao.getNome(),
            saldoDeMoedas: aluno.getSaldoDeMoedas(),
            curso: aluno.getCurso(),
        });
        

    }

    async remover(aluno: Aluno): Promise<void> {
        // throw new Error("Method not implemented.");

        const verificarAluno = await AlunoModel.findOne({ where: { cpf: aluno.getCpf() } });

        if(verificarAluno){
            await verificarAluno.destroy();
        }

    }

    async atualizar(cpf: Aluno, novoAluno: Aluno): Promise<void> {
        throw new Error("Method not implemented.");
    }
    
    async encontrarTodos(): Promise<Aluno[]> {
        // throw new Error("Method not implemented.");

        const todosAlunosModel = await AlunoModel.findAll();
        const todosAlunos: Aluno[] = [];
        for(const aluno of todosAlunosModel){
            todosAlunos.push(new Aluno(
                aluno.nome,
                aluno.rg,
                aluno.cpf,
                aluno.email,
                aluno.senha,
                aluno.endereco,
                new Instituicao(aluno.instituicao),
                aluno.saldoDeMoedas,
                aluno.curso,
                []
            ))
        }

        return todosAlunos;
    }
    
}