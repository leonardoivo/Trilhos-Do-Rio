<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\AcervoDTO;
use TDR\LO\AcervoLO;
use \ArrayObject;
use \PDO;

class CrudAcervo extends Crud{
    public $id_Acervo=0;
    public $nome_Acervo="";
    private $conexao;
    private $efetivar;
    public $Acervo;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarAcervo(){
    
        $resultado=$this->conexao->query("select * from Acervo");
         $Acervo = new AcervoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $AcervoDT= new AcervoDTO();
            $AcervoDT->id_Acervo=$linha['id_Acervo'];
            $AcervoDT->nome_acervo=$linha['nome_acervo'];
            $AcervoDT->id_patrimonio=$linha['id_patrimonio'];
            $AcervoDT->Descricao=$linha['Descricao'];
            $AcervoDT->DataDeCriacao=$linha['DataDeCriacao'];
            $AcervoDT->acervo=$linha['acervo'];     
            $Acervo->add($AcervoDT);
        }
        return $Acervo;
        }
    
    
    
    public function GravarAcervo(AcervoDTO $AcervoDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Acervo (nome_acervo,id_patrimonio,Descricao,DataDeCriacao) values (:nome_acervo,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nomeAcervo",$AcervoDT->nome_acervo);
    $this->efetivar->bindValue("id_patrimonio",$AcervoDT->id_patrimonio);
    $this->efetivar->bindValue("Descricao", $AcervoDT->Descricao);
    $this->efetivar->bindValue("DataDeCriacao",$AcervoDT->DataDeCriacao);
    $this->efetivar->bindValue("acervo",$AcervoDT->acervo);
    $this->efetivar->execute();
    
    }
    
    public function AlterarAcervo(AcervoDTO $AcervoDT){
        $this->efetivar=$this->conexao->prepare("update Acervo set nome_acervo=:nome_acervo,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Acervo=:id_Acervo");
        $this->efetivar->bindValue("nomeAcervo",$AcervoDT->nome_acervo);
        $this->efetivar->bindValue("id_patrimonio",$AcervoDT->id_patrimonio);
        $this->efetivar->bindValue("Descricao", $AcervoDT->Descricao);
        $this->efetivar->bindValue("DataDeCriacao",$AcervoDT->DataDeCriacao);
        $this->efetivar->bindValue("acervo",$AcervoDT->acervo);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirAcervo($id_Acervo){
    
        $this->efetivar=$this->conexao->prepare("delete from  Acervo where id_Acervo=?");
        $this->efetivar->bindValue(1,$id_Acervo);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>