import { Instituicao } from "./Instituicao";
import { Transicao } from "./Transicao";
import { Usuario } from "./Usuario";

export class Aluno extends Usuario {
    private curso: string;
    private recebimentoDeMoedas: Array<Transicao>;

    

  
    constructor(
        nome: string, 
        rg: string, 
        cpf: string, 
        email: string, 
        senha: string,
        endereco: string, 
        instituicao: Instituicao, 
        saldoDeMoedas: number,
        curso: string, 
        recebimentoDeMoedas: Array<Transicao>
    ) {
        super(nome, rg, cpf, email, senha, endereco, instituicao, saldoDeMoedas);
        this.curso = curso;
        this.recebimentoDeMoedas = recebimentoDeMoedas;
    }


    public getCurso(): string {
        return this.curso;
    }

    public setCurso(curso: string): void {
        this.curso = curso;
    }

    public getRecebimentoDeMoedas(): Array<Transicao> {
        return this.recebimentoDeMoedas;
    }

    public setRecebimentoDeMoedas(recebimentoDeMoedas: Array<Transicao>): void {
        this.recebimentoDeMoedas = recebimentoDeMoedas;
    }
}
