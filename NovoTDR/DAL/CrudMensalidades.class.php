<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\MensalidadeDTO;
use TDR\LO\MensalidadeLO;
use \ArrayObject;
use \PDO;

class CrudMensalidade extends Crud{
    public $id_Mensalidade=0;
    public $nome_Mensalidade="";
    private $conexao;
    private $efetivar;
    public $Mensalidade;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarMensalidade(){
    
        $resultado=$this->conexao->query("select * from Mensalidade");
         $Mensalidade = new MensalidadeLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $MensalidadeDT= new MensalidadeDTO();
            $MensalidadeDT->id_mensalidade=$linha['id_mensalidade'];
            $MensalidadeDT->valor=$linha['valor'];
            $MensalidadeDT->id_usuario=$linha['id_usuario'];
            $MensalidadeDT->data_de_emissao=$linha['data_de_emissao'];
            $MensalidadeDT->data_de_vencimento=$linha['data_de_vencimento'];
            $MensalidadeDT->cod_barras=$linha['cod_barras'];     
            $Mensalidade->add($MensalidadeDT);
        }
        return $Mensalidade;
        }
    
    
    
    public function GravarMensalidade(MensalidadeDTO $MensalidadeDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Mensalidade (nome_Mensalidade,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Mensalidade,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("valor",$MensalidadeDT->valor);
    $this->efetivar->bindValue("id_usuario",$MensalidadeDT->id_usuario);
    $this->efetivar->bindValue("data_de_emissao", $MensalidadeDT->data_de_emissao);
    $this->efetivar->bindValue("data_de_vencimento",$MensalidadeDT->data_de_vencimento);
    $this->efetivar->bindValue("cod_barras",$MensalidadeDT->cod_barras);
    $this->efetivar->execute();
    
    }
    
    public function AlterarMensalidade(MensalidadeDTO $MensalidadeDT){
        $this->efetivar=$this->conexao->prepare("update Mensalidade set nome_Mensalidade=:nome_Mensalidade,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Mensalidade=:id_Mensalidade");
        $this->efetivar->bindValue("id_mensalidade",$MensalidadeDT->id_mensalidade);
        $this->efetivar->bindValue("valor",$MensalidadeDT->valor);
        $this->efetivar->bindValue("id_usuario",$MensalidadeDT->id_usuario);
        $this->efetivar->bindValue("data_de_emissao", $MensalidadeDT->data_de_emissao);
        $this->efetivar->bindValue("data_de_vencimento",$MensalidadeDT->data_de_vencimento);
        $this->efetivar->bindValue("cod_barras",$MensalidadeDT->cod_barras);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirMensalidade($id_mensalidade){
    
        $this->efetivar=$this->conexao->prepare("delete from  Mensalidade where id_mensalidade=?");
        $this->efetivar->bindValue(1,$id_mensalidade);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>