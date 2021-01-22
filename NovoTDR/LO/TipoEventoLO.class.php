<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\TipoEventosDTO;
class TipoEventosLO{
private $TipoEventos;

function  __construct()
{
    $this->TipoEventos= new ArrayObject();
}
public function add(TipoEventosDTO $TipoEvento)
    {
        //$this->TipoEventos->offsetSet($TipoEvento->getTitulo(),$TipoEvento); //Função porfora77
        $this->TipoEventos->append($TipoEvento); //adiciona um indice automatico
    }
    public function getTipoEventos(){

        return $this->TipoEventos;
    }
    public function del(TipoEventosDTO $TipoEvento)
    {
        $this->TipoEventos->offsetUnset($TipoEvento);
    }

    public function find(TipoEventosDTO $TipoEvento)
    {
        return $this->TipoEventos->offsetExists($TipoEvento);
    }

}

}
?>