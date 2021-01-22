<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\AdministracaoDTO;
class AdministracaoLO{
private $administracao;

function  __construct()
{
    $this->administracao= new ArrayObject();
}
public function add(AdministracaoDTO $secao)
    {
        //$this->administracao->offsetSet($secao->getTitulo(),$secao); //Função porfora77
        $this->administracao->append($secao); //adiciona um indice automatico
    }
    public function getAdministracao(){

        return $this->administracao;
    }
    public function del(AdministracaoDTO $secao)
    {
        $this->administracao->offsetUnset($secao);
    }

    public function find(AdministracaoDTO $secao)
    {
        return $this->administracao->offsetExists($secao);
    }

}

}
?>