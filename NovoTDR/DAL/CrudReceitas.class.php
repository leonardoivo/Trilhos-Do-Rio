<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\ReceitasDTO;
use TDR\LO\ReceitasLO;
use \ArrayObject;
use \PDO;

class CrudReceitas extends Crud{
    public $id_Receitas=0;
    public $nome_Receitas="";
    private $conexao;
    private $efetivar;
    public $Receitas;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarReceitas(){
    
        $resultado=$this->conexao->query("select * from Receitas");
         $Receitas = new ReceitasLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
            $ReceitasDT= new ReceitasDTO();
            $ReceitasDT->id_receita=$linha['id_receita'];
            $ReceitasDT->id_mensalidade=$linha['id_mensalidade'];
            $ReceitasDT->id_doacoes=$linha['id_doacoes'];
            $ReceitasDT->vendas=$linha['vendas'];
            $Receitas->add($ReceitasDT);
        }
        return $Receitas;
        }
    
    
    
    public function GravarReceitas(ReceitasDTO $ReceitasDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Receitas (nome_Receitas,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Receitas,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("id_mensalidade",$ReceitasDT->id_mensalidade);
    $this->efetivar->bindValue("id_doacoes", $ReceitasDT->id_doacoes);
    $this->efetivar->bindValue("vendas",$ReceitasDT->vendas);
    $this->efetivar->execute();
    
    }
    
    public function AlterarReceitas(ReceitasDTO $ReceitasDT){
        $this->efetivar=$this->conexao->prepare("update Receitas set nome_Receitas=:nome_Receitas,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Receitas=:id_Receitas");
        $this->efetivar->bindValue("id_receita",$ReceitasDT->id_receita);
        $this->efetivar->bindValue("id_mensalidade",$ReceitasDT->id_mensalidade);
        $this->efetivar->bindValue("id_doacoes", $ReceitasDT->id_doacoes);
        $this->efetivar->bindValue("vendas",$ReceitasDT->vendas);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirReceitas($id_receita){
    
        $this->efetivar=$this->conexao->prepare("delete from  Receitas where id_receita=?");
        $this->efetivar->bindValue(1,$id_receita);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>