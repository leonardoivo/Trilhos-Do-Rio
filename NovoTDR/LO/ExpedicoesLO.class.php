<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\ExpedicoesDTO;
class ExpedicoesLO{
private $expedicao;

function  __construct()
{
    $this->expedicao= new ArrayObject();
}
public function add(ExpedicoesDTO $expedicao)
    {
        //$this->expedicao->offsetSet($expedicao->getTitulo(),$expedicao); //Função porfora77
        $this->expedicao->append($expedicao); //adiciona um indice automatico
    }
    public function getExpedicoes(){

        return $this->expedicao;
    }
    public function del(ExpedicoesDTO $expedicao)
    {
        $this->expedicao->offsetUnset($expedicao);
    }

    public function find(ExpedicoesDTO $expedicao)
    {
        return $this->expedicao->offsetExists($expedicao);
    }

}

}
?>