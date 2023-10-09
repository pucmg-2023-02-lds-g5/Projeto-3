import { Departamento } from "./Departamento";
import { Instituicao } from "./Instituicao";
import { Transicao } from "./Transicao";
import { Usuario } from "./Usuario";

export class Professor extends Usuario {
    private departamento: Departamento;
    private envioDeModeas: Array<Transicao>;

    constructor(
        nome: string, 
        rg: string, 
        cpf: string, 
        email: string, 
        senha: string,
        endereco: string, 
        instituicao: Instituicao, 
        saldoDeMoedas: number,
        departamento: Departamento, 
        envioDeModeas: Array<Transicao>
    ) {
        super(nome, rg, cpf, email, senha, endereco, instituicao, saldoDeMoedas);
        this.departamento = departamento
        this.envioDeModeas = envioDeModeas
    }


}