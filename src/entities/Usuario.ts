import { Instituicao } from "./Instituicao";

export abstract class Usuario {
   
    private nome: string;
    private rg: string;
    private cpf: string;
    private email: string;
    private endereco: string;
    private instituicao: Instituicao;
    private saldoDeMoedas: number;


    public constructor(
        nome: string, 
        rg: string, 
        cpf: string, 
        email: string, 
        endereco: string, 
        instituicao: Instituicao, 
        saldoDeMoedas: number
    ) {
        this.nome = nome
        this.rg = rg
        this.cpf = cpf
        this.email = email
        this.endereco = endereco
        this.instituicao = instituicao
        this.saldoDeMoedas = saldoDeMoedas
    }   

    public getNome(): string {
        return this.nome;
    }

    public setNome(nome: string): void {
        this.nome = nome;
    }

    public getRg(): string {
        return this.rg;
    }

    public setRg(rg: string): void {
        this.rg = rg;
    }

    public getCpf(): string {
        return this.cpf;
    }

    public setCpf(cpf: string): void {
        this.cpf = cpf;
    }

    public getEmail(): string {
        return this.email;
    }

    public setEmail(email: string): void {
        this.email = email;
    }

    public getEndereco(): string {
        return this.endereco;
    }

    public setEndereco(endereco: string): void {
        this.endereco = endereco;
    }

    public getInstituicao(): Instituicao {
        return this.instituicao;
    }

    public setInstituicao(instituicao: Instituicao): void {
        this.instituicao = instituicao;
    }

    public getSaldoDeMoedas(): number {
        return this.saldoDeMoedas;
    }

    public setSaldoDeMoedas(saldoDeMoedas: number): void {
        this.saldoDeMoedas = saldoDeMoedas;
    }


}