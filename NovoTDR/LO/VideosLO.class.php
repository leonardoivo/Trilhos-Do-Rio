<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\VideosDTO;
class VideosLO{
private $Videos;

function  __construct()
{
    $this->Videos= new ArrayObject();
}
public function add(VideosDTO $video)
    {
        //$this->Videos->offsetSet($video->getTitulo(),$video); //Função porfora77
        $this->Videos->append($video); //adiciona um indice automatico
    }
    public function getVideos(){

        return $this->Videos;
    }
    public function del(VideosDTO $video)
    {
        $this->Videos->offsetUnset($video);
    }

    public function find(VideosDTO $video)
    {
        return $this->Videos->offsetExists($video);
    }

}

}
?>