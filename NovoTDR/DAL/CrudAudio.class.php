<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\AudiosDTO;
use TDR\LO\AudiosLO;
use \ArrayObject;
use \PDO;

class CrudAudios extends Crud{
    public $id_Audios=0;
    public $nome_Audios="";
    private $conexao;
    private $efetivar;
    public $Audios;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarAudios(){
    
        $resultado=$this->conexao->query("select * from Audios");
         $Audios = new AudiosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $AudiosDT= new AudiosDTO();
            $AudiosDT->id_Audios=$linha['id_audios'];
            $AudiosDT->nome_Audios=$linha['nome_audio'];
            $AudiosDT->tipo_audio=$linha['tipo_audio'];
            $AudiosDT->autor=$linha['autor'];
            $AudiosDT->descricao=$linha['descricao'];
            $AudiosDT->id_acervo=$linha['id_acervo']; 
            $AudiosDT->formato=$linha['formato'];     
    
            $Audios->add($AudiosDT);
        
        }
        return $Audios;
        }
    
    
    
    public function GravarAudios(AudiosDTO $AudiosDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Audios (nome_Audios,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Audios,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_audio",$AudiosDT->nome_audio);
    $this->efetivar->bindValue("tipo_audio",$AudiosDT->tipo_audio);
    $this->efetivar->bindValue("autor", $AudiosDT->autor);
    $this->efetivar->bindValue("descricao",$AudiosDT->descricao);
    $this->efetivar->bindValue("id_acervo",$AudiosDT->id_acervo);
    $this->efetivar->bindValue("formato",$AudiosDT->formato);

    $this->efetivar->execute();
    
    }
    
    public function AlterarAudios(AudiosDTO $AudiosDT){
        $this->efetivar=$this->conexao->prepare("update Audios set nome_Audios=:nome_Audios,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Audios=:id_Audios");
        $this->efetivar->bindValue("id_audios",$AudiosDT->id_audios);
        $this->efetivar->bindValue("nome_audio",$AudiosDT->nome_audio);
        $this->efetivar->bindValue("tipo_audio",$AudiosDT->tipo_audio);
        $this->efetivar->bindValue("autor", $AudiosDT->autor);
        $this->efetivar->bindValue("descricao",$AudiosDT->descricao);
        $this->efetivar->bindValue("id_acervo",$AudiosDT->id_acervo);
        $this->efetivar->bindValue("formato",$AudiosDT->formato);
    

        $this->efetivar->execute();
    
    }
    
    public function ExcluirAudios($id_Audios){
    
        $this->efetivar=$this->conexao->prepare("delete from  Audios where id_Audios=?");
        $this->efetivar->bindValue(1,$id_Audios);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>