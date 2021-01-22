<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\ReuniaoDTO;
class ReuniaoLO{
private $Reuniao;

function  __construct()
{
    $this->Reuniao= new ArrayObject();
}
public function add(ReuniaoDTO $reuniao)
    {
        //$this->Reuniao->offsetSet($reuniao->getTitulo(),$reuniao); //Função porfora77
        $this->Reuniao->append($reuniao); //adiciona um indice automatico
    }
    public function getReuniao(){

        return $this->Reuniao;
    }
    public function del(ReuniaoDTO $reuniao)
    {
        $this->Reuniao->offsetUnset($reuniao);
    }

    public function find(ReuniaoDTO $reuniao)
    {
        return $this->Reuniao->offsetExists($reuniao);
    }

}

}
?>