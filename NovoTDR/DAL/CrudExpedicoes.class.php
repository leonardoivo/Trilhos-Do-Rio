<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\ExpedicoesDTO;
use TDR\LO\ExpedicoesLO;
use \ArrayObject;
use \PDO;

class CrudExpedicoes extends Crud{
    public $id_Expedicoes=0;
    public $nome_Expedicoes="";
    private $conexao;
    private $efetivar;
    public $Expedicoes;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarExpedicoes(){
    
        $resultado=$this->conexao->query("select * from Expedicoes");
         $Expedicoes = new ExpedicoesLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $ExpedicoesDT= new ExpedicoesDTO();
            $ExpedicoesDT->id_exp=$linha['$id_exp'];
            $ExpedicoesDT->nome_expedicao=$linha['nome_expedicao'];
            $ExpedicoesDT->data_expedicao=$linha['data_expedicao'];
            $ExpedicoesDT->desc_expedicao=$linha['desc_expedicao'];
            $ExpedicoesDT->relat_exped=$linha['relat_exped'];
            $ExpedicoesDT->id_usuario=$linha['id_usuario'];     
            $ExpedicoesDT->num_participantes=$linha['num_participantes'];     
            $ExpedicoesDT->participantes=$linha['participantes'];     
            $ExpedicoesDT->localExpedicao=$linha['localExpedicao'];     

            $Expedicoes->add($ExpedicoesDT);
        }
        return $Expedicoes;
        }
    
    
    
    public function GravarExpedicoes(ExpedicoesDTO $ExpedicoesDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Expedicoes (nome_Expedicoes,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Expedicoes,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_expedicao",$ExpedicoesDT->nome_expedicao);
    $this->efetivar->bindValue("data_expedicao",$ExpedicoesDT->data_expedicao);
    $this->efetivar->bindValue("desc_expedicao", $ExpedicoesDT->desc_expedicao);
    $this->efetivar->bindValue("relat_exped",$ExpedicoesDT->relat_exped);
    $this->efetivar->bindValue("id_usuario",$ExpedicoesDT->id_usuario);
    $this->efetivar->bindValue("num_participantes",$ExpedicoesDT->num_participantes);
    $this->efetivar->bindValue("participantes",$ExpedicoesDT->participantes);
    $this->efetivar->bindValue("localExpedicao",$ExpedicoesDT->localExpedicao);



    $this->efetivar->execute();
    
    }
    
    public function AlterarExpedicoes(ExpedicoesDTO $ExpedicoesDT){
        $this->efetivar=$this->conexao->prepare("update Expedicoes set nome_Expedicoes=:nome_Expedicoes,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Expedicoes=:id_Expedicoes");
        $this->efetivar->bindValue("id_exp",$ExpedicoesDT->id_exp);
        $this->efetivar->bindValue("nome_expedicao",$ExpedicoesDT->nome_expedicao);
        $this->efetivar->bindValue("data_expedicao",$ExpedicoesDT->data_expedicao);
        $this->efetivar->bindValue("desc_expedicao", $ExpedicoesDT->desc_expedicao);
        $this->efetivar->bindValue("relat_exped",$ExpedicoesDT->relat_exped);
        $this->efetivar->bindValue("id_usuario",$ExpedicoesDT->id_usuario);
        $this->efetivar->bindValue("num_participantes",$ExpedicoesDT->num_participantes);
        $this->efetivar->bindValue("participantes",$ExpedicoesDT->participantes);
        $this->efetivar->bindValue("localExpedicao",$ExpedicoesDT->localExpedicao);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirExpedicoes($id_exp){
    
        $this->efetivar=$this->conexao->prepare("delete from  Expedicoes where id_exp=?");
        $this->efetivar->bindValue(1,$id_exp);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>