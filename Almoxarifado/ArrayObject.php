<?php namespace livraria;

/**
 * Como usar ArrayObject
 * OBS: Instale o php xdebug para visualizar os resultados.
 **/

/**
 * Objeto livro
 * @author Wouerner <wouerner@gmail.com>
 **/

class Livro {

    private $titulo;
    private $autor;

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function setAutor($autor){
      $this->autor=$autor;

    }

}

/**
 * Coleção de livros
 *
 * @author Wouerner <wouerner@gmail.com>
 **/

namespace livraria;
use \ArrayObject;

class Colecao {

    private $titulo;
    private $livros;

    public function __construct($titulo)
    {
        $this->titulo = $titulo;
        $this->livros = new ArrayObject();
        // poderia implementar com extends para herdar todos metodos de ArrayObject
    }

    public function getLivros(){

        return $this->livros;
    }



    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function addLivro(Livro $livro)
    {
        $this->livros->offsetSet($livro->getTitulo(),$livro); //Função porfora77
        //$this->livros->append($livro); //adiciona um indice automatico
    }

    public function delLivro(Livro $livro)
    {
        $this->livros->offsetUnset($livro->getTitulo() );
    }

    public function findLivro(Livro $livro)
    {
        return $this->livros->offsetExists($livro->getTitulo());
    }
}

$livro = new Livro();
$livro->setTitulo('Apocalipse');
$livro->setAutor('João');


$livro2 = new Livro();
$livro2->setTitulo('Geneses');
$livro2->setAutor('Moises');

$colecao = new Colecao('Biblia');
$colecao->addLivro($livro);
$colecao->addLivro($livro2);

//adiciona 2 livros
echo 'Livros:' ;
var_dump($livro);
var_dump($livro2);

// mostrando a coleção
echo 'Colecao:';
var_dump($colecao);

//procura o livro
echo 'Encontrou, '.$livro->getTitulo().'?';
var_dump($colecao->findLivro($livro));

//excluir o livro
echo 'Livro excluido!';
$colecao->delLivro($livro2);
var_dump($colecao);

foreach($colecao->getLivros() as $k => $livro)
{
    echo $k.' => '.$livro->getTitulo().', '.$livro->getAutor();
}
echo "<br/>";
// total dos livros
echo 'total: '.$colecao->getLivros()->count();