<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\AudiosDTO;
class AudiosLO{
private $audio;

function  __construct()
{
    $this->audio= new ArrayObject();
}
public function add(AudiosDTO $audio)
    {
        //$this->audio->offsetSet($audio->getTitulo(),$audio); //Função porfora77
        $this->audio->append($audio); //adiciona um indice automatico
    }
    public function getAudios(){

        return $this->audio;
    }
    public function del(AudiosDTO $audio)
    {
        $this->audio->offsetUnset($audio);
    }

    public function find(AudiosDTO $audio)
    {
        return $this->audio->offsetExists($audio);
    }

}

}
?>