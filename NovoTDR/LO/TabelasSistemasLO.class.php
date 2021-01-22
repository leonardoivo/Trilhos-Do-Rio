<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\TabelasSistemasDTO;
class TabelasSistemasLO{
private $TabelasSistemas;

function  __construct()
{
    $this->TabelasSistemas= new ArrayObject();
}
public function add(TabelasSistemasDTO $TabelasSistema)
    {
        //$this->TabelasSistemas->offsetSet($TabelasSistema->getTitulo(),$TabelasSistema); //Função porfora77
        $this->TabelasSistemas->append($TabelasSistema); //adiciona um indice automatico
    }
    public function getTabelasSistemas(){

        return $this->TabelasSistemas;
    }
    public function del(TabelasSistemasDTO $TabelasSistema)
    {
        $this->TabelasSistemas->offsetUnset($TabelasSistema);
    }

    public function find(TabelasSistemasDTO $TabelasSistema)
    {
        return $this->TabelasSistemas->offsetExists($TabelasSistema);
    }

}

}
?>