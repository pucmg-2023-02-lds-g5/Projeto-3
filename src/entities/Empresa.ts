export class Empresa {
    
    private nome: string;
    private email: string;
    private cnpj: string;
    private senha: string;

    constructor(
        nome: string, 
        email: string, 
        cnpj: string, 
        senha: string
    ) {
        this.nome = nome
        this.email = email
        this.cnpj = cnpj
        this.senha = senha
    }  

    public getNome(): string {
        return this.nome;
    }

    public setNome(nome: string): void {
        this.nome = nome;
    }

    public getEmail(): string {
        return this.email;
    }

    public setEmail(email: string): void {
        this.email = email;
    }

    public getCnpj(): string {
        return this.cnpj;
    }

    public setCnpj(cnpj: string): void {
        this.cnpj = cnpj;
    }

    public getSenha(): string {
        return this.senha;
    }

    public setSenha(senha: string): void {
        this.senha = senha;
    }
}