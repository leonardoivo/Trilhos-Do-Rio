<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\CargosDTO;
use TDR\LO\CargosLO;
use \ArrayObject;
use \PDO;

class CrudCargos extends Crud{
    public $id_Cargos=0;
    public $nome_Cargos="";
    private $conexao;
    private $efetivar;
    public $Cargos;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarCargos(){
    
        $resultado=$this->conexao->query("select * from Cargos");
         $Cargos = new CargosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $CargosDT= new CargosDTO();
            $CargosDT->id_cargo=$linha['id_cargo'];
            $CargosDT->nome_cargo=$linha['nome_cargo'];
            $CargosDT->desc_cargo=$linha['desc_cargo'];
            $CargosDT->tipo_cargo=$linha['tipo_cargo'];
            $CargosDT->id_perfil=$linha['id_perfil'];
            $CargosDT->id_usuario=$linha['id_usuario'];     
            $Cargos->add($CargosDT);

        }
        return $Cargos;
        }
    
    
    
    public function GravarCargos(CargosDTO $CargosDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Cargos (nome_Cargos,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Cargos,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_cargo",$CargosDT->nome_cargo);
    $this->efetivar->bindValue("tipo_cargo", $CargosDT->tipo_cargo);
    $this->efetivar->bindValue("id_perfil",$CargosDT->id_perfil);
    $this->efetivar->bindValue("id_usuario",$CargosDT->id_usuario);
    $this->efetivar->execute();
    
    }
    
    public function AlterarCargos(CargosDTO $CargosDT){
        $this->efetivar=$this->conexao->prepare("update Cargos set nome_Cargos=:nome_Cargos,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Cargos=:id_Cargos");
        $this->efetivar->bindValue("id_cargo", $CargosDT->id_cargo);
        $this->efetivar->bindValue("nome_cargo",$CargosDT->nome_cargo);
        $this->efetivar->bindValue("tipo_cargo", $CargosDT->tipo_cargo);
        $this->efetivar->bindValue("id_perfil",$CargosDT->id_perfil);
        $this->efetivar->bindValue("id_usuario",$CargosDT->id_usuario);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirCargos($id_cargo){
    
        $this->efetivar=$this->conexao->prepare("delete from  Cargos where id_Cargos=?");
        $this->efetivar->bindValue(1,$id_cargo);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>