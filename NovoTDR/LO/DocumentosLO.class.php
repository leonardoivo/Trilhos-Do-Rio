<?php
namespace FG\LO
{
use \ArrayObject;
use TDR\DTO\DocumentosDTO;
class DocumentosLO{
private $documento;

function  __construct()
{
    $this->documento= new ArrayObject();
}
public function add(DocumentosDTO $documento)
    {
        //$this->documento->offsetSet($documento->getTitulo(),$documento); //Função porfora77
        $this->documento->append($documento); //adiciona um indice automatico
    }
    public function getDocumentos(){

        return $this->documento;
    }
    public function del(DocumentosDTO $documento)
    {
        $this->documento->offsetUnset($documento);
    }

    public function find(DocumentosDTO $documento)
    {
        return $this->documento->offsetExists($documento);
    }

}

}
?>