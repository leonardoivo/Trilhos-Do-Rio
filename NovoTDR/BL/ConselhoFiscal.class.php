<?php
namespace TDR\BL{
use TDR\BL\Relatorio;
use TDR\DAL\CrudConselhoFiscal;
use TDR\DTO\ConselhoFiscalDTO;
use TDR\LO\ConselhoFiscalLO;
class ConselhoFiscal extends Relatorio{
 
    public function ListarConselho(){
        $listaConselho = new CrudConselhoFiscal();
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

        public function listarPorID(int $id_relatorio){}
       
       public function Criar(){}
       
        public function Excluir(int $id_relatorio){}
       
         
}
    
}
?>