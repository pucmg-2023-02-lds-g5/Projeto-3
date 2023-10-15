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
                empresaEncontrada.email,
                empresaEncontrada.cnpj,
                empresaEncontrada.senha
            );
        }

        return null;
    }

    async encontrarPeloEmail(email: string): Promise<Empresa | null> {

        const empresaEncontrada = await EmpresaModel.findOne({where: {email: email}});

        if(empresaEncontrada){
            return new Empresa(
                empresaEncontrada.nome,
                empresaEncontrada.email,
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
        const verificarAluno = await EmpresaModel.findOne({ where: { cnpj: empresa.getCnpj() } });

        if(verificarAluno){
            await verificarAluno.destroy();
        }

    }

    async encontrarTodasEmpresas(): Promise<Empresa[]> {
        const todasEmpresasModel = await EmpresaModel.findAll();
        const todasEmpresas: Empresa[] = [];

        for(const empresa of todasEmpresasModel){
            todasEmpresas.push(new Empresa(empresa.nome, empresa.email, empresa.cnpj, empresa.senha))
        }

        return todasEmpresas;
    }
    
}