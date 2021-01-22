<?php
include("config.php");
function VerAcesso($usuario,$link){

    $queryAcesso = "select cg.tipo_cargo tipo_cargo from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
    $queryVerAcesso=mysqli_query($link,$queryAcesso);

    while($linhaAcesso=mysqli_fetch_assoc($queryVerAcesso))
     {
 
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

function RegistrarAcesso($usuario,$Departamento,$acao,$link)
 {
 
  
   $id_usuario=BuscaUsuario($usuario,$link);
   $evento=TipoEvento($acao,$link);

 $InserirMovimentacao = "insert into LogEventos (NomeEvento,id_tipoEvento,id_usuario,dataEvento) values ($evento na parte de $Departamento',$acao,'".$id_usuario."',now())";

 $queryNome=mysqli_query($link,$InserirMovimentacao);



}

function  NomeUsuario($usuario,$link)
{
  $nome="";
  $QueryNomeUsuario = "SELECT nome, id_usuario FROM usuarios	WHERE cpf =".$usuario;
	$queryNome=mysqli_query($link,$QueryNomeUsuario);
	$nome = "";	
   while($linhaNome=mysqli_fetch_assoc($queryNome))
       {

	      $nome = $linhaNome['nome'];
	     

      }

return $nome;
}

  function BuscaUsuario($usuario,$link){
    $QueryNomeUsuario = "SELECT nome, id_usuario FROM usuarios	WHERE cpf =".$usuario;
  
    $queryNome=mysqli_query($link,$QueryNomeUsuario);
  
    $nome = "";	
    $id_usuario="";
      while($linhaNome=mysqli_fetch_assoc($queryNome))
     {
  
        $nome = $linhaNome['nome'];
        $id_usuario= $linhaNome['id_usuario'];
  
     }
    return $id_usuario; 
    
  }

  function TipoEvento($acao,$link){
    $QueryTipoEvento = "SELECT id_tipoEvento, tipo_evento FROM  TipoEvento WHERE id_tipoEvento=".$acao;
  
    $queryEvento=mysqli_query($link,$QueryTipoEvento);
  
    
    $TipoEvento="";
      while($linhaEvento=mysqli_fetch_assoc($queryEvento))
     {
  
      $TipoEvento = $linhaEvento['tipo_evento'];
  
  
     }
    return $TipoEvento; 
    
  }


  function ListarRegistrosAcesso($pagina,$link){
    $linhastotais=0;
    $linhasPorPagina=10;
    $totalpaginas=0;
    $paginacorrente=0;
    $queryMovimentacaoUserTotal = "select * from LogEventos logEv inner join usuarios usr on logEv.id_usuario=usr.id_usuario
    inner join TipoEvento Tev on logEv.id_tipoEvento=Tev.id_tipoEvento";
	

	$querymovUserTotal = mysqli_query($link,$queryMovimentacaoUserTotal);
	$linhastotais=mysqli_num_rows($querymovUserTotal);
	$totalpaginas=ceil($linhastotais/$linhasPorPagina);
	$paginacorrente=($linhasPorPagina*$pagina)-$linhasPorPagina;
	$queryMovimentacaoUser = "SELECT usr.nome, logEv.dataEvento, CONCAT( Tev.tipo_evento, logEv.NomeEvento ) NomeEvento
	FROM LogEventos logEv INNER JOIN usuarios usr ON logEv.id_usuario = usr.id_usuario INNER JOIN TipoEvento Tev ON logEv.id_tipoEvento = Tev.id_tipoEvento
	ORDER BY dataEvento DESC LIMIT $paginacorrente,$linhasPorPagina";
	$querymovUser = mysqli_query($link,$queryMovimentacaoUser);


	while($linha=mysqli_fetch_assoc($querymovUser))
	   {
		echo "O usuario ".$linha['nome']." ";
		echo $linha['NomeEvento']." no sistema ";
		echo "no dia ".$linha['dataEvento']."<br/>";
	   }

	   $incremento=$pagina+1;
	   $decremento=$pagina-1;
	   $avanco=($incremento>$totalpaginas)?1:$incremento;
	   $retorno=(1>$decremento)?1:$decremento;
  

	   echo "<a href='index.php?pagina=$retorno'>&laquo;Voltar </a>";
	   for($i=1;$totalpaginas>$i;$i++)
	   {

         echo "<a href='index.php?pagina=$i'>".$i  ."&nbsp;</a>";

	   }

	  echo "<a href='index.php?pagina=$avanco'> Avançar &raquo;</a>";
	  echo "<br/>";
	  echo "<a href=\"index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
    echo "</body></html>";


  }






        ?>