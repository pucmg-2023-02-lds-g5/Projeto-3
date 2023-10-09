import { Empresa } from "../../entities/Empresa";

export interface IEmpresaRepository {
    encontrarPeloCnpj(cnpj: string): Promise<Empresa | null>;

    criarEmpresa(empresa: Empresa): Promise<void>;

    removerEmpresa(empresa: Empresa): Promise<void>;

    encontrarTodasEmpresas(): Promise<Empresa[]>;
}