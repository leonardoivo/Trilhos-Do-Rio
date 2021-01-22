<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\AcervoDTO;
class AcervoLO{
private $acervos;

function  __construct()
{
    $this->acervos= new ArrayObject();
}
public function add(AcervoDTO $acervo)
    {
        //$this->acervos->offsetSet($acervo->getTitulo(),$acervo); //Função porfora77
        $this->acervos->append($acervo); //adiciona um indice automatico
    }
    public function getacervos(){

        return $this->acervos;
    }
    public function del(AcervoDTO $acervo)
    {
        $this->acervos->offsetUnset($acervo);
    }

    public function find(AcervoDTO $acervo)
    {
        return $this->acervos->offsetExists($acervo);
    }

}

}
?>