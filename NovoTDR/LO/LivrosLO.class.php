<?php
namespace TDR\LO
{
use \ArrayObject;
use TDR\DTO\LivrosDTO;
class LivrosLO{
private $Livros;

function  __construct()
{
    $this->Livros= new ArrayObject();
}
public function add(LivrosDTO $livro)
    {
        //$this->Livros->offsetSet($livro->getTitulo(),$livro); //Função porfora77
        $this->Livros->append($livro); //adiciona um indice automatico
    }
    public function getLivros(){

        return $this->Livros;
    }
    public function del(LivrosDTO $livro)
    {
        $this->Livros->offsetUnset($livro);
    }

    public function find(LivrosDTO $livro)
    {
        return $this->Livros->offsetExists($livro);
    }

}

}
?>