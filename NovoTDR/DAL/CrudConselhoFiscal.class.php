<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\ConselhoFiscalDTO;
use TDR\LO\ConselhoFiscalLO;
use \ArrayObject;
use \PDO;

class CrudConselhoFiscal extends Crud{
    public $id_ConselhoFiscal=0;
    public $nome_ConselhoFiscal="";
    private $conexao;
    private $efetivar;
    public $ConselhoFiscal;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarConselhoFiscalGeral(){
    
        $resultado=$this->conexao->query("select * from ConselhoFiscal");
         $ConselhoFiscal = new ConselhoFiscalLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $ConselhoFiscalDT= new ConselhoFiscalDTO();
            $ConselhoFiscalDT->id_conselho=$linha['id_conselho'];
            $ConselhoFiscalDT->Titulo=$linha['Titulo'];
            $ConselhoFiscalDT->Relatorio=$linha['Relatorio'];
            $ConselhoFiscalDT->id_cargo=$linha['id_cargo'];
            $ConselhoFiscalDT->id_usuario=$linha['id_usuario'];
            $ConselhoFiscal->add($ConselhoFiscalDT);

      
        }
        return $ConselhoFiscal;
        }
    
    
    
    public function GravarConselhoFiscal(ConselhoFiscalDTO $ConselhoFiscalDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into ConselhoFiscal (nome_ConselhoFiscal,id_patrimonio,Descricao,DataDeCriacao) values (:nome_ConselhoFiscal,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("Titulo",$ConselhoFiscalDT->Titulo);
    $this->efetivar->bindValue("Relatorio", $ConselhoFiscalDT->Relatorio);
    $this->efetivar->bindValue("id_cargo",$ConselhoFiscalDT->id_cargo);
    $this->efetivar->bindValue("id_usuario",$ConselhoFiscalDT->id_usuario);
    $this->efetivar->execute();
    
    }
    
    public function AlterarConselhoFiscal(ConselhoFiscalDTO $ConselhoFiscalDT){
        $this->efetivar=$this->conexao->prepare("update ConselhoFiscal set nome_ConselhoFiscal=:nome_ConselhoFiscal,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_ConselhoFiscal=:id_ConselhoFiscal");
        $this->efetivar->bindValue("id_conselho",$ConselhoFiscalDT->id_conselho);
        $this->efetivar->bindValue("Titulo",$ConselhoFiscalDT->Titulo);
        $this->efetivar->bindValue("Relatorio", $ConselhoFiscalDT->Relatorio);
        $this->efetivar->bindValue("id_cargo",$ConselhoFiscalDT->id_cargo);
        $this->efetivar->bindValue("id_usuario",$ConselhoFiscalDT->id_usuario);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirConselhoFiscal($id_conselho){
    
        $this->efetivar=$this->conexao->prepare("delete from  ConselhoFiscal where id_ConselhoFiscal=?");
        $this->efetivar->bindValue(1,$id_conselho);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>