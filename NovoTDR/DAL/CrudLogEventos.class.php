<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\LogEventosDTO;
use TDR\LO\LogEventosLO;
use \ArrayObject;
use \PDO;

class CrudLogEventos extends Crud{
    public $id_LogEventos=0;
    public $nome_LogEventos="";
    private $conexao;
    private $efetivar;
    public $LogEventos;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarLogEventos(){
    
        $resultado=$this->conexao->query("select * from LogEventos");
         $LogEventos = new LogEventosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $LogEventosDT= new LogEventosDTO();
            $LogEventosDT->idEvento=$linha['idEvento'];
            $LogEventosDT->NomeEvento=$linha['NomeEvento'];
            $LogEventosDT->id_tipoEvento=$linha['id_tipoEvento'];
            $LogEventosDT->id_usuario=$linha['id_usuario'];
            $LogEventosDT->cargo=$linha['cargo'];
            $LogEventosDT->tabela=$linha['tabela'];  
            $LogEventosDT->tabela=$linha['dataEvento'];  
            $LogEventos->add($LogEventosDT);
        }
        return $LogEventos;
        }
    
    
    
    public function GravarLogEventos(LogEventosDTO $LogEventosDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into LogEventos (nome_LogEventos,id_patrimonio,Descricao,DataDeCriacao) values (:nome_LogEventos,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("NomeEvento",$LogEventosDT->NomeEvento);
    $this->efetivar->bindValue("id_patrimonio",$LogEventosDT->id_patrimonio);
    $this->efetivar->bindValue("id_tipoEvento", $LogEventosDT->id_tipoEvento);
    $this->efetivar->bindValue("id_usuario",$LogEventosDT->id_usuario);
    $this->efetivar->bindValue("cargo",$LogEventosDT->cargo);
    $this->efetivar->bindValue("tabela",$LogEventosDT->tabela);
    $this->efetivar->bindValue("dataEvento",$LogEventosDT->dataEvento);

    $this->efetivar->execute();
    
    }
    
    public function AlterarLogEventos(LogEventosDTO $LogEventosDT){
        $this->efetivar=$this->conexao->prepare("update LogEventos set nome_LogEventos=:nome_LogEventos,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_LogEventos=:id_LogEventos");
        $this->efetivar->bindValue("idEvento",$LogEventosDT->idEvento);
        $this->efetivar->bindValue("NomeEvento",$LogEventosDT->NomeEvento);
        $this->efetivar->bindValue("id_patrimonio",$LogEventosDT->id_patrimonio);
        $this->efetivar->bindValue("id_tipoEvento", $LogEventosDT->id_tipoEvento);
        $this->efetivar->bindValue("id_usuario",$LogEventosDT->id_usuario);
        $this->efetivar->bindValue("cargo",$LogEventosDT->cargo);
        $this->efetivar->bindValue("tabela",$LogEventosDT->tabela);
        $this->efetivar->bindValue("dataEvento",$LogEventosDT->dataEvento);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirLogEventos($idEvento){
    
        $this->efetivar=$this->conexao->prepare("delete from  LogEventos where idEvento=?");
        $this->efetivar->bindValue(1,$idEvento);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>