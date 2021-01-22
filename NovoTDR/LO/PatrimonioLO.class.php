<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\PatrimonioDTO;
class PatrimonioLO{
private $Patrimonio;

function  __construct()
{
    $this->Patrimonio= new ArrayObject();
}
public function add(PatrimonioDTO $patrimonio)
    {
        //$this->Patrimonio->offsetSet($patrimonio->getTitulo(),$patrimonio); //Função porfora77
        $this->Patrimonio->append($patrimonio); //adiciona um indice automatico
    }
    public function getPatrimonio(){

        return $this->Patrimonio;
    }
    public function del(PatrimonioDTO $patrimonio)
    {
        $this->Patrimonio->offsetUnset($patrimonio);
    }

    public function find(PatrimonioDTO $patrimonio)
    {
        return $this->Patrimonio->offsetExists($patrimonio);
    }

}

}
?>