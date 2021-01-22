<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\GrupoSubPaginasDTO;
class GrupoSubPaginasLO{
private $grupoSubPagina;

function  __construct()
{
    $this->GrupoSubPaginas= new ArrayObject();
}
public function add(GrupoSubPaginasDTO $grupoSubPagina)
    {
        //$this->GrupoSubPaginas->offsetSet($grupoSubPagina->getTitulo(),$grupoSubPagina); //Função porfora77
        $this->GrupoSubPaginas->append($grupoSubPagina); //adiciona um indice automatico
    }
    public function getGrupoSubPaginas(){

        return $this->GrupoSubPaginas;
    }
    public function del(GrupoSubPaginasDTO $grupoSubPagina)
    {
        $this->GrupoSubPaginas->offsetUnset($grupoSubPagina);
    }

    public function find(GrupoSubPaginasDTO $grupoSubPagina)
    {
        return $this->GrupoSubPaginas->offsetExists($grupoSubPagina);
    }

}

}
?>