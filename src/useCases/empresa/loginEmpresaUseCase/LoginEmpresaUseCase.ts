import config from "config";
import { IEmpresaRepository } from "../../../repository/empresaRepository/IEmpresaRepository";
import { ILoginEmpresaDTO } from "./ILoginEmpresaDTO";
import { sign } from "jsonwebtoken";

export class LoginEmpresaUseCase {
    private empresaRepository: IEmpresaRepository;

    public constructor(empresaRepository: IEmpresaRepository){
        this.empresaRepository = empresaRepository;
    }   

    public async execute(data: ILoginEmpresaDTO): Promise<string>{
        const verificarEmpresa = await this.empresaRepository.encontrarPeloEmail(data.email);

        if(!verificarEmpresa){
            throw new Error("Email ou senha incorreto");
        }

        if(verificarEmpresa.getSenha() !== data.senha){
            throw new Error("Email ou senha incorreto");
        }

        const authorization = sign({cnpj: verificarEmpresa.getCnpj()}, config.get<string>("jwtSecret"))

        return authorization;
    }
}