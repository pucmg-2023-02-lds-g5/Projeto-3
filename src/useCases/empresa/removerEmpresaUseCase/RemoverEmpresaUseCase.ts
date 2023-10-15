import { IEmpresaRepository } from "../../../repository/empresaRepository/IEmpresaRepository";
import { IRemoverEmpresaDTO } from "./IRemoverEmpresaDTO";

export class RemoverEmpresaUseCase {
    private empresaRepository: IEmpresaRepository;  
    
    public constructor(empresaRepository: IEmpresaRepository) {
        this.empresaRepository = empresaRepository;
    }

    public async execute(data: IRemoverEmpresaDTO){
        const verificarEmpresa = await this.empresaRepository.encontrarPeloCnpj(data.cnpj);

        if(!verificarEmpresa){
            throw new Error("Empresa não encontrada");
        }

        this.empresaRepository.removerEmpresa(verificarEmpresa);
    }
}