<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\ReuniaoDTO;
use TDR\LO\ReuniaoLO;
use \ArrayObject;
use \PDO;

class CrudReuniao extends Crud{
    public $id_Reuniao=0;
    public $nome_Reuniao="";
    private $conexao;
    private $efetivar;
    public $Reuniao;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarReuniao(){
    
        $resultado=$this->conexao->query("select * from Reuniao");
         $Reuniao = new ReuniaoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $ReuniaoDT= new ReuniaoDTO();
            $ReuniaoDT->id_reuniao=$linha['id_reuniao'];
            $ReuniaoDT->nome_reuniao=$linha['nome_reuniao'];
            $ReuniaoDT->desc_reuniao=$linha['desc_reuniao'];
            $ReuniaoDT->relat_ata_reuniao=$linha['relat_ata_reuniao'];
            $ReuniaoDT->local=$linha['local'];
            $ReuniaoDT->data_reuniao=$linha['data_reuniao'];
            $ReuniaoDT->id_usuarios=$linha['id_usuarios'];
            $ReuniaoDT->id_cargo=$linha['id_cargo'];
            $Reuniao->add($ReuniaoDT);

        }
        return $Reuniao;
        }
    
    
    
    public function GravarReuniao(ReuniaoDTO $ReuniaoDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Reuniao (nome_Reuniao,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Reuniao,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_reuniao",$ReuniaoDT->nome_reuniao);
    $this->efetivar->bindValue("desc_reuniao", $ReuniaoDT->desc_reuniao);
    $this->efetivar->bindValue("relat_ata_reuniao",$ReuniaoDT->relat_ata_reuniao);
    $this->efetivar->bindValue("local",$ReuniaoDT->local);
    $this->efetivar->bindValue("data_reuniao",$ReuniaoDT->data_reuniao);
    $this->efetivar->bindValue("id_cargo",$ReuniaoDT->id_cargo);


    $this->efetivar->execute();
    
    }
    
    public function AlterarReuniao(ReuniaoDTO $ReuniaoDT){
        $this->efetivar=$this->conexao->prepare("update Reuniao set nome_Reuniao=:nome_Reuniao,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Reuniao=:id_Reuniao");
        $this->efetivar->bindValue("id_reuniao",$ReuniaoDT->id_reuniao);
        $this->efetivar->bindValue("nome_reuniao",$ReuniaoDT->nome_reuniao);
        $this->efetivar->bindValue("desc_reuniao", $ReuniaoDT->desc_reuniao);
        $this->efetivar->bindValue("relat_ata_reuniao",$ReuniaoDT->relat_ata_reuniao);
        $this->efetivar->bindValue("local",$ReuniaoDT->local);
        $this->efetivar->bindValue("data_reuniao",$ReuniaoDT->data_reuniao);
        $this->efetivar->bindValue("id_cargo",$ReuniaoDT->id_cargo);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirReuniao($id_reuniao){
    
        $this->efetivar=$this->conexao->prepare("delete from  Reuniao where id_reuniao=?");
        $this->efetivar->bindValue(1,$id_reuniao);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>