<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\GrupoSubPaginasDTO;
use TDR\LO\GrupoSubPaginasLO;
use \ArrayObject;
use \PDO;

class CrudGrupoSubPaginas extends Crud{
    public $id_GSubPaginas=0;
    public $nome_GSubPaginas="";
    private $conexao;
    private $efetivar;
    public $GrupoSubPaginas;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarGrupoSubPaginas(){
    
        $resultado=$this->conexao->query("select * from GrupoSubPaginas");
         $GrupoSubPaginas = new GrupoSubPaginasLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $GrupoSubPaginasDT= new GrupoSubPaginasDTO();
            $GrupoSubPaginasDT->id_grupo=$linha['id_grupo'];
            $GrupoSubPaginasDT->nome_pagina=$linha['nome_pagina'];
            $GrupoSubPaginasDT->id_tabela=$linha['id_tabela'];
            $GrupoSubPaginasDT->id_perfil=$linha['id_perfil'];
            $GrupoSubPaginasDT->pasta=$linha['pasta'];
            $GrupoSubPaginas->add($GrupoSubPaginasDT);

        }
        return $GrupoSubPaginas;
        }
    
    
    
    public function GravarGrupoSubPaginas(GrupoSubPaginasDTO $GrupoSubPaginasDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into GrupoSubPaginas (nome_GrupoSubPaginas,id_patrimonio,Descricao,DataDeCriacao) values (:nome_GrupoSubPaginas,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nome_pagina",$GrupoSubPaginasDT->nome_pagina);
    $this->efetivar->bindValue("id_tabela",$GrupoSubPaginasDT->id_tabela);
    $this->efetivar->bindValue("id_perfil", $GrupoSubPaginasDT->id_perfil);
    $this->efetivar->bindValue("pasta",$GrupoSubPaginasDT->pasta);
    $this->efetivar->execute();
    
    }
    
    public function AlterarGrupoSubPaginas(GrupoSubPaginasDTO $GrupoSubPaginasDT){
        $this->efetivar=$this->conexao->prepare("update GrupoSubPaginas set nome_GrupoSubPaginas=:nome_GrupoSubPaginas,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_GrupoSubPaginas=:id_GrupoSubPaginas");
        $this->efetivar->bindValue("id_grupo",$GrupoSubPaginasDT->id_grupo);
        $this->efetivar->bindValue("nome_pagina",$GrupoSubPaginasDT->nome_pagina);
        $this->efetivar->bindValue("id_tabela",$GrupoSubPaginasDT->id_tabela);
        $this->efetivar->bindValue("id_perfil", $GrupoSubPaginasDT->id_perfil);
        $this->efetivar->bindValue("pasta",$GrupoSubPaginasDT->pasta);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirGrupoSubPaginas($id_grupo){
    
        $this->efetivar=$this->conexao->prepare("delete from  GrupoSubPaginas where id_grupo=?");
        $this->efetivar->bindValue(1,$id_grupo);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>