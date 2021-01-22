<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\PatrimonioDTO;
use TDR\LO\PatrimonioLO;
use \ArrayObject;
use \PDO;

class CrudPatrimonio extends Crud{
    public $id_Patrimonio=0;
    public $nome_Patrimonio="";
    private $conexao;
    private $efetivar;
    public $Patrimonio;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarPatrimonio(){
    
        $resultado=$this->conexao->query("select * from Patrimonio");
         $Patrimonio = new PatrimonioLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $PatrimonioDT= new PatrimonioDTO();
            $PatrimonioDT->id_patrimonio=$linha['id_patrimonio'];
            $PatrimonioDT->nome_do_bem=$linha['nome_do_bem'];
            $PatrimonioDT->marca=$linha['marca'];
            $PatrimonioDT->data_de_integracao=$linha['data_de_integracao'];
            $PatrimonioDT->tipo_de_material=$linha['tipo_de_material'];
            $PatrimonioDT->Origem=$linha['Origem'];     
            $Patrimonio->add($PatrimonioDT);

        }
        return $Patrimonio;
        }
    
    
    
    public function GravarPatrimonio(PatrimonioDTO $PatrimonioDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Patrimonio (nome_Patrimonio,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Patrimonio,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_do_bem",$PatrimonioDT->nome_do_bem);
    $this->efetivar->bindValue("marca",$PatrimonioDT->marca);
    $this->efetivar->bindValue("data_de_integracao", $PatrimonioDT->Descricao);
    $this->efetivar->bindValue("tipo_de_material",$PatrimonioDT->tipo_de_material);
    $this->efetivar->bindValue("Origem",$PatrimonioDT->Origem);
    $this->efetivar->execute();
    
    }
    
    public function AlterarPatrimonio(PatrimonioDTO $PatrimonioDT){
        $this->efetivar=$this->conexao->prepare("update Patrimonio set nome_Patrimonio=:nome_Patrimonio,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Patrimonio=:id_Patrimonio");
        $this->efetivar->bindValue("id_patrimonio",$PatrimonioDT->id_patrimonio);
        $this->efetivar->bindValue("nome_do_bem",$PatrimonioDT->nome_do_bem);
        $this->efetivar->bindValue("marca",$PatrimonioDT->marca);
        $this->efetivar->bindValue("data_de_integracao", $PatrimonioDT->Descricao);
        $this->efetivar->bindValue("tipo_de_material",$PatrimonioDT->tipo_de_material);
        $this->efetivar->bindValue("Origem",$PatrimonioDT->Origem);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirPatrimonio($id_patrimonio){
    
        $this->efetivar=$this->conexao->prepare("delete from  Patrimonio where id_patrimonio=?");
        $this->efetivar->bindValue(1,$id_patrimonio);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>