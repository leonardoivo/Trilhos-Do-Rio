<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\TipoAcervoDTO;
class TipoAcervoLO{
private $TipoAcervo;

function  __construct()
{
    $this->TipoAcervo= new ArrayObject();
}
public function add(TipoAcervoDTO $TipoAcervo)
    {
        //$this->TipoAcervo->offsetSet($TipoAcervo->getTitulo(),$TipoAcervo); //Função porfora77
        $this->TipoAcervo->append($TipoAcervo); //adiciona um indice automatico
    }
    public function getTipoAcervo(){

        return $this->TipoAcervo;
    }
    public function del(TipoAcervoDTO $TipoAcervo)
    {
        $this->TipoAcervo->offsetUnset($TipoAcervo);
    }

    public function find(TipoAcervoDTO $TipoAcervo)
    {
        return $this->TipoAcervo->offsetExists($TipoAcervo);
    }

}

}
?>