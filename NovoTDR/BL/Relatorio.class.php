<?php
namespace TDR\BL{
    use TDR\DAL\{CrudConselhoFiscal,CrudExpedicoes,CrudReuniao};
    use TDR\DTO\{ConselhoFiscalDTO,ExpedicoesDTO,ReceitasDTO};
    use TDR\LO\{ConselhoFiscalLO,ExpedicoesLO,ReuniaoLO};
  abstract  class Relatorio {

abstract public function listar();

abstract public function listarPorID(int $id_relatorio);

abstract public function Criar();

abstract public function Excluir(int $id_relatorio);




}

}
?>