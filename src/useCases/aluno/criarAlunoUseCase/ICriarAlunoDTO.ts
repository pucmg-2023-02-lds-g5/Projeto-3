import { Instituicao } from "../../../entities/Instituicao";

export interface ICriarAlunoDTO {
    nome: string, 
    rg: string, 
    cpf: string, 
    email: string, 
    endereco: string, 
    instituicao: string, 
    curso: string, 
}