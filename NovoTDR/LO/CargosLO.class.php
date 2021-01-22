<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\CargosDTO;
class CargosLO{
private $cargo;

function  __construct()
{
    $this->cargo= new ArrayObject();
}
public function add(CargosDTO $cargo)
    {
        //$this->cargo->offsetSet($cargo->getTitulo(),$cargo); //Função porfora77
        $this->cargo->append($cargo); //adiciona um indice automatico
    }
    public function getCargos(){

        return $this->cargo;
    }
    public function del(CargosDTO $cargo)
    {
        $this->cargo->offsetUnset($cargo);
    }

    public function find(CargosDTO $cargo)
    {
        return $this->cargo->offsetExists($cargo);
    }

}

}
?>