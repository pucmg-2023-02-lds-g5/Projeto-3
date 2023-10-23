import { Aluno } from "../../entities/Aluno";

export interface IAlunoRepository {
    encontrarPeloCpf(cpf: string): Promise<Aluno | null>;

    encontrarPeloEmail(email: string): Promise<Aluno | null>;

    criarNovo(aluno: Aluno): Promise<void>;

    remover(aluno: Aluno): Promise<void>;

    atualizar(cpf: Aluno, novoAluno: Aluno): Promise<void>;

    encontrarTodos(): Promise<Aluno[]>;
}