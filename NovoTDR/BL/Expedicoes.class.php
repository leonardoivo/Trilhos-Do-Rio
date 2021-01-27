<?php
namespace TDR\BL{
use TDR\BL\Relatorio;
    use TDR\DAL\CrudExpedicoes;
    use TDR\DTO\ExpedicoesDTO;;
use TDR\LO\ExpedicoesLO;
class Expedicoes extends Relatorio{

public function __construct()
{
    
}
public function ListarConselho(){
    $listaConselho = new CrudExpedicoes();
    $LconselhoFiscal = new ConselhoFiscalLO();
    $LconselhoFiscal= $listaConselho->ListarConselhoFiscalGeral();
    
    return $LconselhoFiscal;
    }    
    
    public function listar(){

        $listaConselho = new CrudConselhoFiscal();
        $LconselhoFiscal = new ConselhoFiscalLO();
        $LconselhoFiscal= $listaConselho->ListarConselhoFiscalGeral();
        
        return $LconselhoFiscal;

    }

    public function listarPorID(int $id_relatorio){
        $listaConselho = new CrudConselhoFiscal();
        $LconselhoFiscal = new ConselhoFiscalLO();
        $LconselhoFiscal = $listaConselho->ListarConselhoFiscalGeralporID($id_relatorio);
        return $LconselhoFiscal;
       
    }
   
   public function Criar(){}
   public function Alterar(int $id_relatorio){



   }
   
    public function Excluir(int $id_relatorio){}
}
    
}
?>