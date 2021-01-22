<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\DespesaDTO;
use TDR\LO\DespesaLO;
use \ArrayObject;
use \PDO;

class CrudDespesa extends Crud{
    public $id_Despesa=0;
    public $nome_Despesa="";
    private $conexao;
    private $efetivar;
    public $Despesa;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarDespesa(){
    
        $resultado=$this->conexao->query("select * from Despesa");
         $Despesa = new DespesaLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $DespesaDT= new DespesaDTO();
            $DespesaDT->id_despesa=$linha['id_despesa'];
            $DespesaDT->tipo_despesa=$linha['tipo_despesa'];
            $DespesaDT->valor=$linha['valor'];               
            $Despesa->add($DespesaDT);

        }
        return $Despesa;
        }
    
    
    
    public function GravarDespesa(DespesaDTO $DespesaDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Despesa (nome_Despesa,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Despesa,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("tipo_despesa)",$DespesaDT->tipo_despesa);
    $this->efetivar->bindValue("valor",$DespesaDT->valor);

    $this->efetivar->execute();
    
    }
    
    public function AlterarDespesa(DespesaDTO $DespesaDT){
        $this->efetivar=$this->conexao->prepare("update Despesa set nome_Despesa=:nome_Despesa,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Despesa=:id_Despesa");
        $this->efetivar->bindValue("id_despesa",$DespesaDT->id_despesa);
        $this->efetivar->bindValue("tipo_despesa",$DespesaDT->tipo_despesa);
        $this->efetivar->bindValue("valor",$DespesaDT->valor);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirDespesa($id_despesa){
    
        $this->efetivar=$this->conexao->prepare("delete from  Despesa where id_Despesa=?");
        $this->efetivar->bindValue(1,$id_despesa);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>