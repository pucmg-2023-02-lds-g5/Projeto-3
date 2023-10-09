import { Departamento } from "./Departamento";
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
        endereco: string, 
        instituicao: unknown, 
        saldoDeMoedas: number,
        departamento: Departamento, 
        envioDeModeas: Array<Transicao>
    ) {
        super(nome, rg, cpf, email, endereco, instituicao, saldoDeMoedas);
        this.departamento = departamento
        this.envioDeModeas = envioDeModeas
    }


}