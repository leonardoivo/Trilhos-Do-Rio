<?php
namespace TDR\BL{
 use TDR\DAL\{CrudPerfil ,CrudUsuarios ,CrudTabelasSistemas  ,CrudGrupoSubPaginas,CrudLogEventos,CrudTipoAcervo};
 use TDR\DTO\{LogEventosDTO,GrupoSubPaginasDTO,PerfilDTO,TabelasSistemasDTO,TipoEventosDTO,UsuariosDTO};
 use TDR\LO\{GrupoSubPaginasLO,PerfilLO,LogEventosLO,TabelasSistemasLO,TipoEventosLO,UsuariosLO};

class ControleAcesso{

public function acesso($login,$senha){
   
$liberar=false;
$veracesso = new CrudUsuarios();
$liberar= $veracesso->ConfirmaLogin($login,$senha);


return $liberar;
}

public function ListaUsuarios(){
$usuarios = new CrudUsuarios();
$Lusuarios = $usuarios->ListarUsuarios();
foreach($Lusuarios->getUsuarios() as $k=>$usuario)
{
   echo $usuario->id_usuario;
   echo $usuario->cpf;
   echo $usuario->nome."<br/>";
}


}


    
}

}

?>