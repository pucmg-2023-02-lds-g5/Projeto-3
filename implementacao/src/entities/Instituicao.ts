export class Instituicao {
    private nome: string;

    constructor(nome: string){
        this.nome = nome;
    }

    public getNome(): string {
        return this.nome;
    }

    public setNome(nome: string): void {
        this.nome = nome;
    }
}