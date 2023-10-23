import { Aluno } from "./Aluno";
import { Professor } from "./Professor";

export class Transicao {
    private professor: Professor;
    private aluno: Aluno;
    private quantidade: number;
    private motivo: string;

  constructor(
    professor: Professor, 
    aluno: Aluno, 
    quantidade: number, 
    motivo: string
) {
    this.professor = professor
    this.aluno = aluno
    this.quantidade = quantidade
    this.motivo = motivo
  }    
}