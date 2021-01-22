<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\VideosDTO;
use TDR\LO\VideosLO;
use \ArrayObject;
use \PDO;

class CrudVideos extends Crud{
    public $id_Videos=0;
    public $nome_Videos="";
    private $conexao;
    private $efetivar;
    public $Videos;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarVideos(){
    
        $resultado=$this->conexao->query("select * from Videos");
         $Videos = new VideosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
            $VideosDT= new VideosDTO();
            $VideosDT->id_video=$linha['id_video'];
            $VideosDT->tipo_video=$linha['tipo_video'];
            $VideosDT->descricao=$linha['descricao'];
            $VideosDT->autor=$linha['autor'];
            $VideosDT->formato=$linha['formato'];
            $VideosDT->id_acervo=$linha['id_acervo'];     
            $Videos->add($VideosDT);
        }
        return $Videos;
        }
    
    
    
    public function GravarVideos(VideosDTO $VideosDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Videos (nome_Videos,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Videos,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("tipo_video",$VideosDT->tipo_video);
    $this->efetivar->bindValue("descricao", $VideosDT->descricao);
    $this->efetivar->bindValue("autor",$VideosDT->autor);
    $this->efetivar->bindValue("formato",$VideosDT->formato);
    $this->efetivar->bindValue("id_acervo",$VideosDT->id_acervo);
    $this->efetivar->execute();
    
    }
    
    public function AlterarVideos(VideosDTO $VideosDT){
        $this->efetivar=$this->conexao->prepare("update Videos set nome_Videos=:nome_Videos,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Videos=:id_Videos");
        $this->efetivar->bindValue("id_video",$VideosDT->id_video);
        $this->efetivar->bindValue("tipo_video",$VideosDT->tipo_video);
        $this->efetivar->bindValue("descricao", $VideosDT->descricao);
        $this->efetivar->bindValue("autor",$VideosDT->autor);
        $this->efetivar->bindValue("formato",$VideosDT->formato);
        $this->efetivar->bindValue("id_acervo",$VideosDT->id_acervo);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirVideos($id_video){
    
        $this->efetivar=$this->conexao->prepare("delete from  Videos where id_video=?");
        $this->efetivar->bindValue(1,$id_video);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>