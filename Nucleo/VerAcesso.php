<?php
include("../config.php");
function VerAcesso($usuario,$link){

    $queryConsFiscal = "select cg.tipo_cargo tipo_cargo from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
     $queryVerAcesso=mysqli_query($link,$queryConsFiscal);

    while($linhaAcesso=mysqli_fetch_assoc($queryVerAcesso)){
 
        $tipo_cargo=$linhaAcesso['tipo_cargo'];



    }

    $Acesso=false;
    switch ($tipo_cargo){
        case '5':
        $Acesso=true;
          break;
        case '6':
        $Acesso=true;
          break;
        case '7':
        $Acesso=true;
          break;
        case '8':
        $Acesso=true;
          break;
        case '1':
        $Acesso=true;
          break;
      }

   return $Acesso;

}
        ?>