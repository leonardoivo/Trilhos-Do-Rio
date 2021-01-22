
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>

<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.ajaxQueue.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/thickbox-compressed.js"></script>
<script type="text/javascript" src="jquery-autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="../js/funcoes.js"></script>
<!--css -->
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css"/>
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/lib/thickbox.css"/>
 
 

 
</head>
<?
 $usuaario = $_REQUEST['ID'];
?>
<form id=FormNew action="" name="" method="post">
<table width="25%">
<TR>
<td><a href="../Excel/AG2EXCEL.php?ID=<? echo $usuaario; ?>"" target="_blank"><img src="../images/excel8.png" align="left"  width="22px" height="21" /></a></td>
<td id="FundoForm001" width="10%">DE</TD>
<td id="FundoForm001" width="15%"><input <input type="DATE" required="required" name="DT1" placeholder="DATA" required="required" value="<? echo date('Y-m-d'); ?>"   size="40%"></TD>
<td id="FundoForm001" width="10%">ATE</TD>
<td id="FundoForm001" width="15%"><input <input type="DATE" required="required" name="DT2" placeholder="DATA" required="required" value="<? echo date('Y-m-d'); ?>"    size="50%"></TD>
<td><input type="submit" name="ENVIAR" value="ENVIAR"></TD>

<body onLoad="goFocus('novo')">
</form>
</tr>
</table>

	 <td><table id="bordaforma002" width="1000"  height="5">
	 <tr>
      <td id="FundoForm001" colspan="11"  height="5" ><span style=" float: left;" >PERIODO <? ECHO 'DE '.$_POST['DT1'].' ATE '.$_POST['DT2']; ?>  </td>
      </tr>
	 <tr >
		<td width="100" id="FundoForm001">CLIENTE</td>
		<td width="50"  id="FundoForm001">DATA</td>
		<td width="50"  id="FundoForm001">QUALIFICAÇÃO</td>
		
	
		<td width="50"  id="FundoForm001">REQUALIFICAÇÃO</td>
		<td width="50"  id="FundoForm001">TOTAL GERAL</td>
		<td width="50"  id="FundoForm001">BAIRRO</td>
		<td width="90"  id="FundoForm001">ADM<table>
        <tr>
          <td id="FundoForm001">CEG                      </td>
          <td id="FundoForm001" align="right">OUTROS</td>
        </tr>
        
      </table></td>
		<td width="90"  id="FundoForm001">VISITA POR ENDEREÇO</td>
		<td width="90"  id="FundoForm001">META DIÁRIA</td>
		</tr>


<?

if(isset($_POST['ENVIAR'])) 
	{
		
		
		
		
		
		$Q1=$_POST['DT1'];
		$Q2=$_POST['DT2'];
		
		
	include '../parametros/parametros1.php';
	sqlsrv_query($conn, "sis.sp_consulta_agen_20 '$Q1' , '$Q2' ,'$usuaario',1 ");
	}else{include '../parametros/parametros1.php';
	sqlsrv_query($conn, "sis.sp_consulta_agen_20 '$Q1' , '$Q2' ,'$usuaario',0 ");}
	
	
	$count = sqlsrv_query($conn, "sis.consulta_age_2_grid '$usuaario' ", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
	$ind =1;
	$count1=0;
	$c1=0;
    $c2=0;
    $c3=0;
    $c4=0;
    $c5=0;
    $c6=0;
    $TemBairro="";
    $bairro="";
    $contBairro=0;
    $contCeg=0;
    $cb=0;
	$T1=0;
	$T2=0;
	$T3=0;
	$T4=0;
	$mt=0;
		while($row = sqlsrv_fetch_array($count))
		{
			
			
			
			
			//SE CONT FOR PAR
if($ind % 2 == 0){
    
    //CLASSE = CLARA
    $Classe = "tipoListarClaro";
	$ClasseL = "tipoListarClaroL";
	    
}
else //SE FOR IMPAR
{

    //CLASSE = ESCURA    
	$Classe = "tipoListarClaro";
	$ClasseL = "tipoListarClaroL";
	
}
		


        if($count1==0)  //Aqui é exibida a data pela primeira vez.
		{
			$temp1=$row['1'];
			$count1=$count1+1;
		  
		}
		 
		if($count1>0) //Quando o loop vira 1, ai é feito os calculos.
		{
			
			 if($contBairro==0)
		     {
			   $TemBairro=$row['0'];
			   $contBairro=$contBairro+1;
			   $bairro=$row['0'];
		     }
			   
			   if($contBairro>0){
			   if($TemBairro==$row['0'])
                 {
				
				   $bairro='';
				   

				  }
				  
				  else if($TemBairro!=$row['0'])
				   {
					$bairro= $row['0'];
					$contBairro=1;
			       }
			         $contBairro=$contBairro+1;
			        
			    }
			
			
			
			
			if($row['1']==$temp1)
			{
			
			$c1=$c1+$row['2'];
            $c2=$c2+$row['3']+$row['4'];
            $c3=$c3+$row['3'];
            $c4=$c4+$row['4'];
            $TemBairro=$row['0'];
            
               if($TemBairro==$row['0'])
             {
				$c5=1;
				
				
				}
				else
				{
					$c5=$c5+1;
					
			    }
			     
			   
			   
           
		                        
            $c6=$c6+preg_match("/[CEG]/i", substr($row['6'],0,3), $match);
            $contCeg=preg_match("/[CEG]/i", substr($row['6'],0,3), $match);
            $mt=CalcularMeta($c4,60);
			$temp1=$row['1'];
			$count1=$count1+1;
			}
			else
			    {
				
				

				?>
		<tr>
		<td Id="FundoForm001"  ><? echo date('d/m/Y',strtotime($temp1)); ?></TD>
		<td Id="FundoForm001"  ></TD>
		
		
		
		<td Id="FundoForm001"  ><? ECHO $c3; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $c4; ?></TD>
		<td Id="FundoForm001"  ><? echo $c1+$c2+$c3+$c4; ?></TD> <!--Contadores Parciais. -->
		<td Id="FundoForm001"  ><? ECHO $c5;
		/*if($c5==0){ 
			
			$c5=$c5+1;   
			ECHO $c5;
			}
			else{
				ECHO $c5;
				}*/
		
		 ?></TD>
		<td Id="FundoForm001"  ><? ECHO $c6; ?></TD>
		<td Id="FundoForm001"  ></TD>
		<td Id="FundoForm001"  ><? ECHO $mt; ?></TD>
		</TR>	
			<?
			   	
			    $c1=0;
				$c2=0;
                $c3=0;
                $c4=0;
				$c5=0;
				$c6=0;
			   
				$mt=0;
				$c1=$c1+$row['2'];
				$c2=$c2+$row['3']+$row['4'];
                $c3=$c3+$row['3'];
                $c4=$c4+$row['4'];
                 if($TemBairro==$row['0'])
               {
				    $c5=$c5+1;
				
				
				}else{ $c5=1;}
               
			$c6=$c6+preg_match("/[CEG]/i", substr($row['6'],0,3), $match);
            $count1=1;
			$temp1=$row['1'];
			
			}
		
		
		}
        ?>  
            <tr id="bordaforma002" >
               <td Id="<? echo $Classe; ?>"><?php echo $row['5']; ?></td> 	
             
              <td Id="<? echo $Classe; ?>"><?php echo date('d/m/Y',strtotime($row['1'])); ?></td>
              <td Id="<? echo $Classe; ?>"><?php echo  $row['2']+$row['3'];?></td>
			 
			 <td Id="<? echo $Classe; ?>"><?php echo $row['3']; ?></td>
			  <td Id="<? echo $Classe; ?>"><?php echo $row['4']; ?></td> 		
			  <td Id="<? echo $Classe; ?>"><?php  echo $bairro;?></td>
			  <td Id="<? echo $Classe; ?>"><?php  
			$cergVar= substr($row['6'],0,3);
			if($cergVar=="CEG")
			{
				echo substr($row['6'],0,3);
				
			}  
			  echo '';
			  
			  
			   ?></td> 
			  <td Id="<? echo $Classe; ?>"></td> 			  
            </tr>
         <? 
		 
		 
		 
		$T1=$T1+$row['2'];
		$T2=$T2+$row['3']+$row['4'];
		$T3=$T3+$row['3'];
		$T4=$T4+$row['4'];
		$T5=$cb;
		$T6=$T6+$contCeg;
		$T7=$T7+$mt;
		
		?>
      
        <?php
		$ind++;
		}
		
		?>
		<tr>
		<td Id="FundoForm001"  ><? echo date('d/m/Y',strtotime($temp1)); ?> </TD>
		
		<td Id="FundoForm001"  ><? echo $c1+$c3+$c4; //ok ?></TD>
		<td Id="FundoForm001"  ><? ECHO $c1; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $c2; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $c3; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $c4; ?></TD>
		</TR>
			 <tr >
		<td width="80" id="FundoForm001"></td>
		<td width="20"  id="FundoForm001"></td>
		<td width="20"  id="FundoForm001">QUALIFICADO</td>
		<td width="20"  id="FundoForm001">REQUALIFICADO</td>
		<td width="20"  id="FundoForm001">TOTAL GERAL</td>
		<td width="20"  id="FundoForm001">BAIRRO</td>
		<td width="20"  id="FundoForm001">ADM</td>
		<td width="50"  id="FundoForm001">VISITA POR ENDEREÇO</td>
		<td width="20"  id="FundoForm001">META TOTAL</td>
		</tr>

		<tr>
		<td Id="FundoForm001"  ></TD>
		<td Id="FundoForm001"  ></TD>
		<td Id="FundoForm001"  ><? ECHO $T3; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $T4; ?></TD>
		<td Id="FundoForm001"  ><? echo $T1+$T3+$T4; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $T5; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $T6; ?></TD>
		<td Id="FundoForm001"  ></TD>
		<td Id="FundoForm001"  ><? ECHO $T7; ?></TD>
		
		</TR>
		<?
			
		sqlsrv_close($conn);

	    function CalcularMeta($Total,$meta){
		
		$alcancado=$Total*100/$meta;
		$alcance=number_format($alcancado, 2, '.', '');
		return $alcance;
		
		}
	
	
	?>
  


  
  
  
  
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.ajaxQueue.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/thickbox-compressed.js"></script>
<script type="text/javascript" src="jquery-autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="../js/funcoes.js"></script>
<!--css -->
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css"/>
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/lib/thickbox.css"/>
 
 

 
</head>


  
