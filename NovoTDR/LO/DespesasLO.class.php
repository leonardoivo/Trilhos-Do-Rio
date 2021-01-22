<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\DespesaDTO;
class DespesaLO{
private $despesa;

function  __construct()
{
    $this->despesa= new ArrayObject();
}
public function add(DespesaDTO $secao)
    {
        //$this->despesa->offsetSet($secao->getTitulo(),$secao); //Função porfora77
        $this->despesa->append($secao); //adiciona um indice automatico
    }
    public function getDespesa(){

        return $this->despesa;
    }
    public function del(DespesaDTO $secao)
    {
        $this->despesa->offsetUnset($secao);
    }

    public function find(DespesaDTO $secao)
    {
        return $this->despesa->offsetExists($secao);
    }

}

}
?>