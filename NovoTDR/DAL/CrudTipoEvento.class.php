<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\TipoAcervoDTO;
use TDR\LO\TipoAcervoLO;
use \ArrayObject;
use \PDO;

class CrudTipoAcervo extends Crud{
    public $id_TipoAcervo=0;
    public $nome_TipoAcervo="";
    private $conexao;
    private $efetivar;
    public $TipoAcervo;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarTipoAcervo(){
    
        $resultado=$this->conexao->query("select * from TipoAcervo");
         $TipoAcervo = new TipoAcervoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
            $TipoAcervoDT= new TipoAcervoDTO();
            $TipoAcervoDT->id_tipo_acervo=$linha['id_tipo_acervo'];
            $TipoAcervoDT->TipoAcervo=$linha['TipoAcervo'];    
            $TipoAcervo->add($TipoAcervoDT);
        }
        return $TipoAcervo;
        }
    
    
    
    public function GravarTipoAcervo(TipoAcervoDTO $TipoAcervoDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into TipoAcervo (nome_TipoAcervo,id_patrimonio,Descricao,DataDeCriacao) values (:nome_TipoAcervo,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("TipoAcervo",$TipoAcervoDT->TipoAcervo);
    $this->efetivar->execute();
    
    }
    
    public function AlterarTipoAcervo(TipoAcervoDTO $TipoAcervoDT){
        $this->efetivar=$this->conexao->prepare("update TipoAcervo set nome_TipoAcervo=:nome_TipoAcervo,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_TipoAcervo=:id_TipoAcervo");
        $this->efetivar->bindValue("id_tipo_acervo",$TipoAcervoDT->id_tipo_acervo);
        $this->efetivar->bindValue("TipoAcervo",$TipoAcervoDT->TipoAcervo);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirTipoAcervo($id_tipo_acervo){
    
        $this->efetivar=$this->conexao->prepare("delete from  TipoAcervo where id_tipo_acervo=?");
        $this->efetivar->bindValue(1,$id_tipo_acervo);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>