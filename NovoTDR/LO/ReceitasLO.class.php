<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\ReceitasDTO;
class ReceitasLO{
private $Receitas;

function  __construct()
{
    $this->Receitas= new ArrayObject();
}
public function add(ReceitasDTO $receita)
    {
        //$this->Receitas->offsetSet($receita->getTitulo(),$receita); //Função porfora77
        $this->Receitas->append($receita); //adiciona um indice automatico
    }
    public function getReceitas(){

        return $this->Receitas;
    }
    public function del(ReceitasDTO $receita)
    {
        $this->Receitas->offsetUnset($receita);
    }

    public function find(ReceitasDTO $receita)
    {
        return $this->Receitas->offsetExists($receita);
    }

}

}
?>