<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\ObjetoDTO;
use TDR\LO\ObjetoLO;
use \ArrayObject;
use \PDO;

class CrudObjeto extends Crud{
    public $id_Objeto=0;
    public $nome_Objeto="";
    private $conexao;
    private $efetivar;
    public $Objeto;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarObjeto(){
    
        $resultado=$this->conexao->query("select * from Objeto");
         $Objeto = new ObjetoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $ObjetoDT= new ObjetoDTO();
            $ObjetoDT->id_objeto=$linha['id_objeto'];
            $ObjetoDT->nome_objeto=$linha['nome_objeto'];
            $ObjetoDT->descricao=$linha['descricao'];
            $ObjetoDT->autor=$linha['autor'];
            $ObjetoDT->origem=$linha['origem'];
            $ObjetoDT->id_acervo=$linha['id_acervo'];     
            $Objeto->add($ObjetoDT);

        }
        return $Objeto;
        }
    
    
    
    public function GravarObjeto(ObjetoDTO $ObjetoDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Objeto (nome_Objeto,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Objeto,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_objeto",$ObjetoDT->nome_objeto);
    $this->efetivar->bindValue("descricao",$ObjetoDT->descricao);
    $this->efetivar->bindValue("autor", $ObjetoDT->autor);
    $this->efetivar->bindValue("origem",$ObjetoDT->origem);
    $this->efetivar->bindValue("id_acervo",$ObjetoDT->id_acervo);
    $this->efetivar->execute();
    
    }
    
    public function AlterarObjeto(ObjetoDTO $ObjetoDT){
        $this->efetivar=$this->conexao->prepare("update Objeto set nome_Objeto=:nome_Objeto,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Objeto=:id_Objeto");
        $this->efetivar->bindValue("id_objeto",$ObjetoDT->id_objeto);
        $this->efetivar->bindValue("nome_objeto",$ObjetoDT->nome_objeto);
        $this->efetivar->bindValue("descricao",$ObjetoDT->descricao);
        $this->efetivar->bindValue("autor", $ObjetoDT->autor);
        $this->efetivar->bindValue("origem",$ObjetoDT->origem);
        $this->efetivar->bindValue("id_acervo",$ObjetoDT->id_acervo);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirObjeto($id_objeto){
    
        $this->efetivar=$this->conexao->prepare("delete from  Objeto where id_objeto=?");
        $this->efetivar->bindValue(1,$id_objeto);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>