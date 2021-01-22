<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\LogEventosDTO;
class LogEventosLO{
private $LogEventos;

function  __construct()
{
    $this->LogEventos= new ArrayObject();
}
public function add(LogEventosDTO $logEvento)
    {
        //$this->LogEventos->offsetSet($logEvento->getTitulo(),$logEvento); //Função porfora77
        $this->LogEventos->append($logEvento); //adiciona um indice automatico
    }
    public function getLogEventos(){

        return $this->LogEventos;
    }
    public function del(LogEventosDTO $logEvento)
    {
        $this->LogEventos->offsetUnset($logEvento);
    }

    public function find(LogEventosDTO $logEvento)
    {
        return $this->LogEventos->offsetExists($logEvento);
    }

}

}
?>