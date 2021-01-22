<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\ImagensDTO;
class ImagensLO{
private $Imagens;

function  __construct()
{
    $this->Imagens= new ArrayObject();
}
public function add(ImagensDTO $imagem)
    {
        //$this->Imagens->offsetSet($imagem->getTitulo(),$imagem); //Função porfora77
        $this->Imagens->append($imagem); //adiciona um indice automatico
    }
    public function getImagens(){

        return $this->Imagens;
    }
    public function del(ImagensDTO $imagem)
    {
        $this->Imagens->offsetUnset($imagem);
    }

    public function find(ImagensDTO $imagem)
    {
        return $this->Imagens->offsetExists($imagem);
    }

}

}
?>