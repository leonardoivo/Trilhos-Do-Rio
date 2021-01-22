<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\ObjetoDTO;
class ObjetoLO{
private $Objeto;

function  __construct()
{
    $this->Objeto= new ArrayObject();
}
public function add(ObjetoDTO $objeto)
    {
        //$this->Objeto->offsetSet($objeto->getTitulo(),$objeto); //Função porfora77
        $this->Objeto->append($objeto); //adiciona um indice automatico
    }
    public function getObjeto(){

        return $this->Objeto;
    }
    public function del(ObjetoDTO $objeto)
    {
        $this->Objeto->offsetUnset($objeto);
    }

    public function find(ObjetoDTO $objeto)
    {
        return $this->Objeto->offsetExists($objeto);
    }

}

}
?>