<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\AdministracaoDTO;
use TDR\LO\AdministracaoLO;
use \ArrayObject;
use \PDO;

class CrudAdministracao extends Crud{
    public $id_Administracao=0;
    public $nome_Administracao="";
    private $conexao;
    private $efetivar;
    public $Administracao;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarAdministracao(){
    
        $resultado=$this->conexao->query("select * from Administracao");
         $Administracao = new AdministracaoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $AdministracaoDT= new AdministracaoDTO();
            $AdministracaoDT->id_adm=$linha['id_adm'];
            $AdministracaoDT->id_usuario=$linha['id_usuario'];
            $AdministracaoDT->id_perfil=$linha['id_perfil'];
            $AdministracaoDT->id_cargo=$linha['id_cargo'];
            $AdministracaoDT->id_financeiro=$linha['id_financeiro'];
            $AdministracaoDT->id_reuniao=$linha['id_reuniao'];    
            $AdministracaoDT->id_expedicao=$linha['id_expedicao'];     
 
            $Administracao->add($AdministracaoDT);
        
        }
        return $Administracao;
        }
    
    
    
    public function GravarAdministracao(AdministracaoDTO $AdministracaoDT)
    {
    $this->conexao->prepare("insert into Administracao (nome_Administracao,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Administracao,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("id_usuario",$AdministracaoDT->id_usuario);
    $this->efetivar->bindValue("id_perfil",$AdministracaoDT->id_perfil);
    $this->efetivar->bindValue("id_cargo",$AdministracaoDT->id_cargo);
    $this->efetivar->bindValue("id_financeiro",$AdministracaoDT->id_financeiro);
    $this->efetivar->bindValue("id_reuniao",$AdministracaoDT->id_reuniao);
    $this->efetivar->bindValue("id_expedicao",$AdministracaoDT->id_expedicao);


    $this->efetivar->execute();
    
    }
    
    public function AlterarAdministracao(AdministracaoDTO $AdministracaoDT){
        $this->efetivar=$this->conexao->prepare("update Administracao set nome_Administracao=:nome_Administracao,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Administracao=:id_Administracao");
        $this->efetivar->bindValue("nomeAdministracao",$AdministracaoDT->nome_Administracao);
        $this->efetivar->bindValue("id_patrimonio",$AdministracaoDT->id_patrimonio);
        $this->efetivar->bindValue("Descricao", $AdministracaoDT->Descricao);
        $this->efetivar->bindValue("DataDeCriacao",$AdministracaoDT->DataDeCriacao);
        $this->efetivar->bindValue("Administracao",$AdministracaoDT->Administracao);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirAdministracao($id_admin){
    
        $this->efetivar=$this->conexao->prepare("delete from  Administracao where id_Administracao=?");
        $this->efetivar->bindValue(1,$id_admin);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>