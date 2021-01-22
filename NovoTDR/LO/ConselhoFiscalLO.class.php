<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\ConselhoFiscalDTO;
class ConselhoFiscalLO{
private $conselhofiscal;

function  __construct()
{
    $this->conselhofiscal= new ArrayObject();
}
public function add(ConselhoFiscalDTO $secao)
    {
        //$this->conselhofiscal->offsetSet($secao->getTitulo(),$secao); //Função porfora77
        $this->conselhofiscal->append($secao); //adiciona um indice automatico
    }
    public function getConselhoFiscal(){

        return $this->conselhofiscal;
    }
    public function del(ConselhoFiscalDTO $secao)
    {
        $this->conselhofiscal->offsetUnset($secao);
    }

    public function find(ConselhoFiscalDTO $secao)
    {
        return $this->conselhofiscal->offsetExists($secao);
    }

}

}
?>