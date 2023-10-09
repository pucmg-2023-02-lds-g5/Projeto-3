import { Empresa } from "../../../entities/Empresa";
import { EmpresaModel } from "../../../models/EmpresaModel";
import { IEmpresaRepository } from "../IEmpresaRepository";

export class MySQLEmpresaRepository implements IEmpresaRepository {

    async encontrarPeloCnpj(cnpj: string): Promise<Empresa | null> {
        // throw new Error("Method not implemented.");

        const empresaEncontrada = await EmpresaModel.findOne({where: {cnpj: cnpj}});

        if(empresaEncontrada){
            return new Empresa(
                empresaEncontrada.nome,
                empresaEncontrada?.email,
                empresaEncontrada.cnpj,
                empresaEncontrada.senha
            );
        }

        return null;
    }
    async criarEmpresa(empresa: Empresa): Promise<void> {
        // throw new Error("Method not implemented.");

        await EmpresaModel.create({
            nome: empresa.getNome(),
            email: empresa.getEmail(),
            cnpj: empresa.getCnpj(),
            senha: empresa.getSenha()
        });
    }
    async removerEmpresa(empresa: Empresa): Promise<void> {
        throw new Error("Method not implemented.");
    }
    async encontrarTodasEmpresas(): Promise<Empresa[]> {
        throw new Error("Method not implemented.");
    }
    
}