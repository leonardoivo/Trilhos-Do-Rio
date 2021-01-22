<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\MensalidadeDTO;
class MensalidadeLO{
private $Mensalidade;

function  __construct()
{
    $this->Mensalidade= new ArrayObject();
}
public function add(MensalidadeDTO $mensalidade)
    {
        //$this->Mensalidade->offsetSet($mensalidade->getTitulo(),$mensalidade); //Função porfora77
        $this->Mensalidade->append($mensalidade); //adiciona um indice automatico
    }
    public function getMensalidade(){

        return $this->Mensalidade;
    }
    public function del(MensalidadeDTO $mensalidade)
    {
        $this->Mensalidade->offsetUnset($mensalidade);
    }

    public function find(MensalidadeDTO $mensalidade)
    {
        return $this->Mensalidade->offsetExists($mensalidade);
    }

}

}
?>