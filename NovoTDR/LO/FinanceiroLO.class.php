<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\FinanceiroDTO;
class FinanceiroLO{
private $financeiro;

function  __construct()
{
    $this->financeiro= new ArrayObject();
}
public function add(FinanceiroDTO $financeiro)
    {
        //$this->Financeiro->offsetSet($financeiro->getTitulo(),$financeiro); //Função porfora77
        $this->Financeiro->append($financeiro); //adiciona um indice automatico
    }
    public function getFinanceiro(){

        return $this->Financeiro;
    }
    public function del(FinanceiroDTO $financeiro)
    {
        $this->Financeiro->offsetUnset($financeiro);
    }

    public function find(FinanceiroDTO $financeiro)
    {
        return $this->Financeiro->offsetExists($financeiro);
    }

}

}
?>