<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\ImagensDTO;
use TDR\LO\ImagensLO;
use \ArrayObject;
use \PDO;

class CrudImagens extends Crud{
    public $id_Imagens=0;
    public $nome_Imagens="";
    private $conexao;
    private $efetivar;
    public $Imagens;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarImagens(){
    
        $resultado=$this->conexao->query("select * from Imagens");
         $Imagens = new ImagensLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $ImagensDT= new ImagensDTO();
            $ImagensDT->id_imagem=$linha['id_imagem'];
            $ImagensDT->nome_imagem=$linha['nome_imagem'];
            $ImagensDT->descricao=$linha['descricao'];
            $ImagensDT->autor=$linha['autor'];
            $ImagensDT->id_acervo=$linha['id_acervo'];
            $ImagensDT->data_de_inclusao=$linha['data_de_inclusao'];     
            $Imagens->add($ImagensDT);

        }
        return $Imagens;
        }
    
    
    
    public function GravarImagens(ImagensDTO $ImagensDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Imagens (nome_Imagens,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Imagens,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_imagem",$ImagensDT->nome_imagem);
    $this->efetivar->bindValue("descricao",$ImagensDT->descricao);
    $this->efetivar->bindValue("autor", $ImagensDT->autor);
    $this->efetivar->bindValue("id_acervo",$ImagensDT->id_acervo);
    $this->efetivar->bindValue("data_de_inclusao",$ImagensDT->data_de_inclusao);
    $this->efetivar->execute();
    
    }
    
    public function AlterarImagens(ImagensDTO $ImagensDT){
        $this->efetivar=$this->conexao->prepare("update Imagens set nome_Imagens=:nome_Imagens,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Imagens=:id_Imagens");
        $this->efetivar->bindValue("id_imagem",$ImagensDT->id_imagem);
        $this->efetivar->bindValue("nome_imagem",$ImagensDT->nome_imagem);
        $this->efetivar->bindValue("descricao",$ImagensDT->descricao);
        $this->efetivar->bindValue("autor", $ImagensDT->autor);
        $this->efetivar->bindValue("id_acervo",$ImagensDT->id_acervo);
        $this->efetivar->bindValue("data_de_inclusao",$ImagensDT->data_de_inclusao);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirImagens($id_imagem){
    
        $this->efetivar=$this->conexao->prepare("delete from  Imagens where id_imagem=?");
        $this->efetivar->bindValue(1,$id_imagem);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>