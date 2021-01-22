<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\TabelasSistemasDTO;
use TDR\LO\TabelasSistemasLO;
use \ArrayObject;
use \PDO;

class CrudTabelasSistemas extends Crud{
    public $id_TabelasSistemas=0;
    public $nome_TabelasSistemas="";
    private $conexao;
    private $efetivar;
    public $TabelasSistemas;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarTabelasSistemas(){
    
        $resultado=$this->conexao->query("select * from TabelasSistemas");
         $TabelasSistemas = new TabelasSistemasLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $TabelasSistemasDT= new TabelasSistemasDTO();
            $TabelasSistemasDT->id_tabela=$linha['id_tabela'];
            $TabelasSistemasDT->nome_tabela=$linha['nome_tabela'];
            $TabelasSistemasDT->id_perfil=$linha['id_perfil'];
            $TabelasSistemasDT->link=$linha['link'];
            $TabelasSistemasDT->Nivel=$linha['Nivel'];
            $TabelasSistemas->add($TabelasSistemasDT);
        }
     

        return $TabelasSistemas;
        }
    
    
    
    public function GravarTabelasSistemas(TabelasSistemasDTO $TabelasSistemasDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into TabelasSistemas (nome_TabelasSistemas,id_patrimonio,Descricao,DataDeCriacao) values (:nome_TabelasSistemas,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_tabela",$TabelasSistemasDT->nome_tabela);
    $this->efetivar->bindValue("id_perfil", $TabelasSistemasDT->id_perfil);
    $this->efetivar->bindValue("link",$TabelasSistemasDT->link);
    $this->efetivar->bindValue("Nivel",$TabelasSistemasDT->Nivel);
    $this->efetivar->execute();
    
    }
    
    public function AlterarTabelasSistemas(TabelasSistemasDTO $TabelasSistemasDT){
        $this->efetivar=$this->conexao->prepare("update TabelasSistemas set nome_TabelasSistemas=:nome_TabelasSistemas,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_TabelasSistemas=:id_TabelasSistemas");
        $this->efetivar->bindValue("id_tabela",$TabelasSistemasDT->id_tabela);
        $this->efetivar->bindValue("nome_tabela",$TabelasSistemasDT->nome_tabela);
        $this->efetivar->bindValue("id_perfil", $TabelasSistemasDT->id_perfil);
        $this->efetivar->bindValue("link",$TabelasSistemasDT->link);
        $this->efetivar->bindValue("Nivel",$TabelasSistemasDT->Nivel);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirTabelasSistemas($id_tabela){
    
        $this->efetivar=$this->conexao->prepare("delete from  TabelasSistemas where id_tabela=?");
        $this->efetivar->bindValue(1,$id_tabela);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>