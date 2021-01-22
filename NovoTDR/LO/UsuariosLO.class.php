<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\UsuariosDTO;
class UsuariosLO{
private $Usuarios;

function  __construct()
{
    $this->Usuarios= new ArrayObject();
}
public function add(UsuariosDTO $usuario)
    {
        //$this->Usuarios->offsetSet($usuario->getTitulo(),$usuario); //Função porfora77
        $this->Usuarios->append($usuario); //adiciona um indice automatico
    }
    public function getUsuarios(){

        return $this->Usuarios;
    }
    public function del(UsuariosDTO $usuario)
    {
        $this->Usuarios->offsetUnset($usuario);
    }

    public function find(UsuariosDTO $usuario)
    {
        return $this->Usuarios->offsetExists($usuario);
    }

}

}
?>