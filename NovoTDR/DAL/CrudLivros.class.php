<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\LivrosDTO;
use TDR\LO\LivrosLO;
use \ArrayObject;
use \PDO;

class CrudLivros extends Crud{
    public $id_Livros=0;
    public $nome_Livros="";
    private $conexao;
    private $efetivar;
    public $Livros;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarLivros(){
    
        $resultado=$this->conexao->query("select * from Livros");
         $Livros = new LivrosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $LivrosDT= new LivrosDTO();
            $LivrosDT->id_livros=$linha['id_livros'];
            $LivrosDT->nome_do_livro=$linha['nome_do_livro'];
            $LivrosDT->Autor=$linha['Autor'];
            $LivrosDT->Ano=$linha['Ano'];
            $LivrosDT->dataDeCadastramento=$linha['dataDeCadastramento'];
            $LivrosDT->tema=$linha['tema']; 
            $LivrosDT->Editora=$linha['Editora'];      
            $Livros->add($LivrosDT);
        }
        return $Livros;
        }
    
    
    
    public function GravarLivros(LivrosDTO $LivrosDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Livros (nome_Livros,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Livros,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_do_livro", $LivrosDT->nome_do_livro);
    $this->efetivar->bindValue("Autor",$LivrosDT->Autor);
    $this->efetivar->bindValue("Ano", $LivrosDT->Ano);
    $this->efetivar->bindValue("dataDeCadastramento",$LivrosDT->dataDeCadastramento);
    $this->efetivar->bindValue("tema",$LivrosDT->tema);
    $this->efetivar->bindValue("Editora",$LivrosDT->Editora);

    $this->efetivar->execute();
    
    }
    
    public function AlterarLivros(LivrosDTO $LivrosDT){
        $this->efetivar=$this->conexao->prepare("update Livros set nome_Livros=:nome_Livros,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Livros=:id_Livros");
        $this->efetivar->bindValue("id_livros", $LivrosDT->id_livros);
        $this->efetivar->bindValue("nome_do_livro", $LivrosDT->nome_do_livro);
        $this->efetivar->bindValue("Autor",$LivrosDT->Autor);
        $this->efetivar->bindValue("Ano", $LivrosDT->Ano);
        $this->efetivar->bindValue("dataDeCadastramento",$LivrosDT->dataDeCadastramento);
        $this->efetivar->bindValue("tema",$LivrosDT->tema);
        $this->efetivar->bindValue("Editora",$LivrosDT->Editora);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirLivros($id_livros){
    
        $this->efetivar=$this->conexao->prepare("delete from  Livros where id_livros=?");
        $this->efetivar->bindValue(1,$id_livros);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>