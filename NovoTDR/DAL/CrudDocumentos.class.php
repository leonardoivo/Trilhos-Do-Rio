<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\DocumentosDTO;
use TDR\LO\DocumentosLO;
use \ArrayObject;
use \PDO;

class CrudDocumentos extends Crud{
    public $id_Documentos=0;
    public $nome_Documentos="";
    private $conexao;
    private $efetivar;
    public $Documentos;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarDocumentos(){
    
        $resultado=$this->conexao->query("select * from Documentos");
         $Documentos = new DocumentosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $DocumentosDT= new DocumentosDTO();
            $DocumentosDT->id_documento=$linha['id_documento'];
            $DocumentosDT->nome_documento=$linha['nome_documento'];
            $DocumentosDT->tipo_documento=$linha['tipo_documento'];
            $DocumentosDT->descricao=$linha['descricao'];
            $DocumentosDT->id_acervo=$linha['id_acervo'];
            $DocumentosDT->formato=$linha['formato'];     
            $Documentos->add($DocumentosDT);

        }
        return $Documentos;
        }
    
    
    
    public function GravarDocumentos(DocumentosDTO $DocumentosDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Documentos (nome_Documentos,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Documentos,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_documento",$DocumentosDT->nome_documento);
    $this->efetivar->bindValue("tipo_documento", $DocumentosDT->tipo_documento);
    $this->efetivar->bindValue("descricao",$DocumentosDT->descricao);
    $this->efetivar->bindValue("id_acervo",$DocumentosDT->id_acervo);
    $this->efetivar->bindValue("formato",$DocumentosDT->formato);

    $this->efetivar->execute();
    
    }
    
    public function AlterarDocumentos(DocumentosDTO $DocumentosDT){
        $this->efetivar=$this->conexao->prepare("update Documentos set nome_Documentos=:nome_Documentos,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Documentos=:id_Documentos");
        $this->efetivar->bindValue("id_documento",$DocumentosDT->id_documento);
        $this->efetivar->bindValue("nome_documento",$DocumentosDT->nome_documento);
        $this->efetivar->bindValue("tipo_documento", $DocumentosDT->tipo_documento);
        $this->efetivar->bindValue("descricao",$DocumentosDT->descricao);
        $this->efetivar->bindValue("id_acervo",$DocumentosDT->id_acervo);
        $this->efetivar->bindValue("formato",$DocumentosDT->formato);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirDocumentos($id_documento){
    
        $this->efetivar=$this->conexao->prepare("delete from  Documentos where id_Documentos=?");
        $this->efetivar->bindValue(1,$id_documento);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>