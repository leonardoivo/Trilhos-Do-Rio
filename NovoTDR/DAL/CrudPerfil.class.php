<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\PerfilDTO;
use TDR\LO\PerfilLO;
use \ArrayObject;
use \PDO;

class CrudPerfil extends Crud{
    public $id_Perfil=0;
    public $nome_Perfil="";
    private $conexao;
    private $efetivar;
    public $Perfil;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarPerfil(){
    
        $resultado=$this->conexao->query("select * from Perfil");
         $Perfil = new PerfilLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
            $PerfilDT= new PerfilDTO();
            $PerfilDT->id_perfil=$linha['id_perfil'];
            $PerfilDT->nome_perfil=$linha['nome_perfil'];
            $PerfilDT->tipo_acesso=$linha['tipo_acesso'];
            $Perfil->add($PerfilDT);
        }
        return $Perfil;
        }
    
    
    
    public function GravarPerfil(PerfilDTO $PerfilDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Perfil (nome_Perfil,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Perfil,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_perfil",$PerfilDT->nome_perfil);
    $this->efetivar->bindValue("tipo_acesso", $PerfilDT->tipo_acesso);
    $this->efetivar->execute();
    
    }
    
    public function AlterarPerfil(PerfilDTO $PerfilDT){
        $this->efetivar=$this->conexao->prepare("update Perfil set nome_Perfil=:nome_Perfil,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Perfil=:id_Perfil");
        $this->efetivar->bindValue("id_perfil",$PerfilDT->id_perfil);
        $this->efetivar->bindValue("nome_perfil",$PerfilDT->nome_perfil);
        $this->efetivar->bindValue("tipo_acesso", $PerfilDT->tipo_acesso);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirPerfil($id_perfil){
    
        $this->efetivar=$this->conexao->prepare("delete from  Perfil where id_perfil=?");
        $this->efetivar->bindValue(1,$id_perfil);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>