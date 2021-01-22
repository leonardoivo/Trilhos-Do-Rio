<?php
namespace TDR\DAL{
use TDR\DAL\Crud;
use TDR\DTO\UsuariosDTO;
use TDR\LO\UsuariosLO;
use \ArrayObject;
use \PDO;

class CrudUsuarios extends Crud{
    public $id_Usuarios=0;
    public $nome_Usuarios="";
    private $conexao;
    private $efetivar;
    public $Usuarios;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarUsuarios(){
    
        $resultado=$this->conexao->query("select * from usuarios");
         $Usuarios = new UsuariosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $UsuariosDT= new UsuariosDTO();
            $UsuariosDT->id_usuario=$linha['id_usuario'];
            $UsuariosDT->cpf=$linha['cpf'];
            $UsuariosDT->nome=$linha['nome'];
            $UsuariosDT->endereco=$linha['endereco'];
            $UsuariosDT->id_perfil=$linha['id_perfil'];
            $UsuariosDT->numero=$linha['numero'];   
            $UsuariosDT->complemento=$linha['complemento'];   
            $UsuariosDT->bairro=$linha['bairro'];   
            $UsuariosDT->cidade=$linha['cidade'];   
            $UsuariosDT->uf=$linha['uf'];   
            $UsuariosDT->data_de_nascimento=$linha['data_de_nascimento'];   
            $UsuariosDT->email=$linha['email'];   
            $UsuariosDT->data_de_associacao=$linha['data_de_associacao'];   
            $UsuariosDT->login=$linha['login'];   
            $UsuariosDT->senha=$linha['senha'];   
            $UsuariosDT->telefone=$linha['telefone'];   
            $UsuariosDT->celular=$linha['celular'];   
            $UsuariosDT->situacao=$linha['situacao'];   
            $UsuariosDT->data_de_desligamento=$linha['data_de_desligamento'];   
            $UsuariosDT->sobrenome=$linha['sobrenome'];   
            $UsuariosDT->naturalidade=$linha['naturalidade'];   
            $UsuariosDT->pais=$linha['pais'];   
            $UsuariosDT->cep=$linha['cep'];   
            $UsuariosDT->estado=$linha['estado'];   
            $Usuarios->add($UsuariosDT);

        }
        return $Usuarios;
        }
    
    public function ConfirmaLogin($login,$senha){
        $retorno=false;
        $resultado=$this->conexao->query("select * from usuarios where cpf={$login} and senha={$senha}");
        $quantidade=count($resultado->fetchAll());
        if($quantidade==1){
         $retorno=true; 
         }
     return $retorno;
    }
    
    public function GravarUsuarios(UsuariosDTO $UsuariosDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into usuarios (cpf,nome,endereco,numero,complemento,bairro,cep,cidade,data_de_nascimento,email,senha,sobrenome,naturalidade,pais,estado) values(':cpf,:nome,:Endereco,:numero,:Complemento,:bairro,:CEP,:cidade,:DataDeNascimento,:Email,:Senha,:sobrenome,:Naturalidade,:Pais,:estado')");
    $this->efetivar->bindParam("cpf",$UsuariosDT->cpf);
    $this->efetivar->bindParam("nome",$UsuariosDT->nome);
    $this->efetivar->bindParam("endereco",$UsuariosDT->endereco);
    $this->efetivar->bindParam("id_perfil",$UsuariosDT->id_perfil);
    $this->efetivar->bindParam("numero",$UsuariosDT->numero);   
    $this->efetivar->bindParam("complemento",$UsuariosDT->complemento);   
    $this->efetivar->bindParam("bairro",$UsuariosDT->bairro);   
    $this->efetivar->bindParam("cidade",$UsuariosDT->cidade);   
    $this->efetivar->bindParam("uf",$UsuariosDT->uf);   
    $this->efetivar->bindParam("data_de_nascimento",$UsuariosDT->data_de_nascimento);   
    $this->efetivar->bindParam("email",$UsuariosDT->email);   
    $this->efetivar->bindParam("data_de_associacao",$UsuariosDT->data_de_associacao);   
    $this->efetivar->bindParam("login",$UsuariosDT->login);   
    $this->efetivar->bindParam("senha",$UsuariosDT->senha);   
    $this->efetivar->bindParam("telefone",$UsuariosDT->telefone);   
    $this->efetivar->bindParam("celular",$UsuariosDT->celular);   
    $this->efetivar->bindParam("situacao",$UsuariosDT->situacao);   
    $this->efetivar->bindParam("data_de_desligamento",$UsuariosDT->data_de_desligamento);   
    $this->efetivar->bindParam("sobrenome",$UsuariosDT->sobrenome);   
    $this->efetivar->bindParam("naturalidade",$UsuariosDT->naturalidade);   
    $this->efetivar->bindParam("pais",$UsuariosDT->pais);   
    $this->efetivar->bindParam("cep",$UsuariosDT->cep);   
    $this->efetivar->bindParam("estado",$UsuariosDT->estado);  
    $this->efetivar->execute();
    
    }
    
    public function AlterarUsuarios(UsuariosDTO $UsuariosDT){
    $this->efetivar=$this->conexao->prepare("update usuarios set nome_Usuarios=:nome_Usuarios,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Usuarios=:id_Usuarios");
    $this->efetivar->bindParam("id_usuario",$UsuariosDT->id_usuario);
    $this->efetivar->bindParam("cpf",$UsuariosDT->cpf);
    $this->efetivar->bindParam("nome",$UsuariosDT->nome);
    $this->efetivar->bindParam("endereco",$UsuariosDT->endereco);
    $this->efetivar->bindParam("id_perfil",$UsuariosDT->id_perfil);
    $this->efetivar->bindParam("numero",$UsuariosDT->numero);   
    $this->efetivar->bindParam("complemento",$UsuariosDT->complemento);   
    $this->efetivar->bindParam("bairro",$UsuariosDT->bairro);   
    $this->efetivar->bindParam("cidade",$UsuariosDT->cidade);   
    $this->efetivar->bindParam("uf",$UsuariosDT->uf);   
    $this->efetivar->bindParam("data_de_nascimento",$UsuariosDT->data_de_nascimento);   
    $this->efetivar->bindParam("email",$UsuariosDT->email);   
    $this->efetivar->bindParam("data_de_associacao",$UsuariosDT->data_de_associacao);   
    $this->efetivar->bindParam("login",$UsuariosDT->login);   
    $this->efetivar->bindParam("senha",$UsuariosDT->senha);   
    $this->efetivar->bindParam("telefone",$UsuariosDT->telefone);   
    $this->efetivar->bindParam("celular",$UsuariosDT->celular);   
    $this->efetivar->bindParam("situacao",$UsuariosDT->situacao);   
    $this->efetivar->bindParam("data_de_desligamento",$UsuariosDT->data_de_desligamento);   
    $this->efetivar->bindParam("sobrenome",$UsuariosDT->sobrenome);   
    $this->efetivar->bindParam("naturalidade",$UsuariosDT->naturalidade);   
    $this->efetivar->bindParam("pais",$UsuariosDT->pais);   
    $this->efetivar->bindParam("cep",$UsuariosDT->cep);   
    $this->efetivar->bindParam("estado",$UsuariosDT->estado); 
        $this->efetivar->execute();
    
    }
    
    public function ExcluirUsuarios($id_usuario){
    
        $this->efetivar=$this->conexao->prepare("delete from  Usuarios where id_usuario=?");
        $this->efetivar->bindParam(1,$id_usuario);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>