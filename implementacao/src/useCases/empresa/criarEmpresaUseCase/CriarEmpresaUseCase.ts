import { Empresa } from "../../../entities/Empresa";
import { IEmpresaRepository } from "../../../repository/empresaRepository/IEmpresaRepository";
import { ICriarEmpresaDTO } from "./ICriarEmpresaDTO";

export class CriarEmpresaUseCase {
    private empresaRepository: IEmpresaRepository;

    public constructor(empresaRepository: IEmpresaRepository){
        this.empresaRepository = empresaRepository;
    }

    public async execute(data: ICriarEmpresaDTO) {
        const verificarEmpresa = await this.empresaRepository.encontrarPeloCnpj(data.cnpj);

        if(verificarEmpresa){
            throw new Error("Empresa já cadastrada");
        }

        await this.empresaRepository.criarEmpresa(new Empresa(data.nome, data.email, data.cnpj, data.senha));
    }
}