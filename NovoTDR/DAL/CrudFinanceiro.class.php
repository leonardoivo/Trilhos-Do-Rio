<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\FinanceiroDTO;
use TDR\LO\FinanceiroLO;
use \ArrayObject;
use \PDO;

class CrudFinanceiro extends Crud{
    public $id_Financeiro=0;
    public $nome_Financeiro="";
    private $conexao;
    private $efetivar;
    public $Financeiro;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarFinanceiro(){
    
        $resultado=$this->conexao->query("select * from Financeiro");
         $Financeiro = new FinanceiroLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $FinanceiroDT= new FinanceiroDTO();
            $FinanceiroDT->id_financeiro=$linha['id_financeiro'];
            $FinanceiroDT->id_despesa=$linha['id_despesa'];
            $FinanceiroDT->id_receita=$linha['id_receita'];
            $FinanceiroDT->balanco_mensal=$linha['balanco_mensal'];
            $FinanceiroDT->relatorio_financ=$linha['relatorio_financ'];
            $Financeiro->add($FinanceiroDT);

        }
        return $Financeiro;
        }
    
    
    
    public function GravarFinanceiro(FinanceiroDTO $FinanceiroDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Financeiro (nome_Financeiro,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Financeiro,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("id_despesa",$FinanceiroDT->id_despesa);
    $this->efetivar->bindValue("id_receita",$FinanceiroDT->id_receita);
    $this->efetivar->bindValue("balanco_mensal", $FinanceiroDT->balanco_mensal);
    $this->efetivar->bindValue("relatorio_financ",$FinanceiroDT->relatorio_financ);
    $this->efetivar->execute();
    
    }
    
    public function AlterarFinanceiro(FinanceiroDTO $FinanceiroDT){
        $this->efetivar=$this->conexao->prepare("update Financeiro set nome_Financeiro=:nome_Financeiro,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Financeiro=:id_Financeiro");
       
        $this->efetivar->bindValue("id_financeiro",$FinanceiroDT->id_financeiro);
        $this->efetivar->bindValue("id_despesa",$FinanceiroDT->id_despesa);
        $this->efetivar->bindValue("id_receita",$FinanceiroDT->id_receita);
        $this->efetivar->bindValue("balanco_mensal", $FinanceiroDT->balanco_mensal);
        $this->efetivar->bindValue("relatorio_financ",$FinanceiroDT->relatorio_financ);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirFinanceiro($id_financeiro){
    
        $this->efetivar=$this->conexao->prepare("delete from  Financeiro where id_financeiro=?");
        $this->efetivar->bindValue(1,$id_financeiro);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>