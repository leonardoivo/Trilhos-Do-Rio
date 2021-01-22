<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\PerfilDTO;
class PerfilLO{
private $Perfil;

function  __construct()
{
    $this->Perfil= new ArrayObject();
}
public function add(PerfilDTO $perfil)
    {
        //$this->Perfil->offsetSet($perfil->getTitulo(),$perfil); //Função porfora77
        $this->Perfil->append($perfil); //adiciona um indice automatico
    }
    public function getPerfil(){

        return $this->Perfil;
    }
    public function del(PerfilDTO $perfil)
    {
        $this->Perfil->offsetUnset($perfil);
    }

    public function find(PerfilDTO $perfil)
    {
        return $this->Perfil->offsetExists($perfil);
    }

}

}
?>