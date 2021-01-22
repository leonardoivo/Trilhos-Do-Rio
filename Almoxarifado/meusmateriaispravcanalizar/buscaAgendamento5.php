

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

	 <td><table id="bordaforma002" width="800"  height="5">
	 <tr>
      <td id="FundoForm001" colspan="11"  height="5" ><span style=" float: left;" >PERIODO <? ECHO 'DE '.$_POST['DT1'].' ATE '.$_POST['DT2']; ?>  </td>
      </tr>
	 <tr >
		<td width="100" id="FundoForm001">BAIRRO</td>
		<td width="50"  id="FundoForm001">DATA</td>
		<td width="50"  id="FundoForm001">QDT PREVISTO</td>
		<td width="50"  id="FundoForm001">QDT CONFIRMADO</td>
		<td width="50"  id="FundoForm001">QDT QUALI</td>
		<td width="50"  id="FundoForm001">QDT REQUA</td>
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
	$T1=0;
	$T2=0;
	$T3=0;
	$T4=0;
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
		


        if($count1==0)
		{
			$temp1=$row['1'];
			$count1=$count1+1;
		}
		
		if($count1>0)
		{
			
			
			
			
			if($row['1']==$temp1)
			{
			
			
			
			
			
						
			$c1=$c1+$row['2'];
            $c2=$c2+$row['3']+$row['4'];
            $c3=$c3+$row['3'];
            $c4=$c4+$row['4'];
            $c5=$c5+$row['0'];
			$temp1=$row['1'];
			$count1=$count1+1;
			}
			else{
				
				
				
				
				
				
				

				?>
		<tr>
		<td Id="FundoForm001"  ><? echo date('d/m/Y',strtotime($temp1)); ?></TD>
		<td Id="FundoForm001"  ><? echo $c1+$c2; ?></TD> <!--Total Geral -->
		<td Id="FundoForm001"  ><? ECHO $c1; ?></TD> <!-- Previsto -->
		<td Id="FundoForm001"  ><? ECHO $c2; ?></TD> <!-- Confirmado-->
		<td Id="FundoForm001"  ><? ECHO $c3; ?></TD> <!-- Qualificado-->
		<td Id="FundoForm001"  ><? ECHO $c4; ?></TD> <!-- Requalificado -->
		</TR>	
			<?
			
			    $c1=0;
				$c2=0;
                $c3=0;
                $c4=0;
				
			
				
				$c1=$c1+$row['2'];
				$c2=$c2+$row['3']+$row['4'];
                $c3=$c3+$row['3'];
                $c4=$c4+$row['4'];
			
            $count1=1;
			$temp1=$row['1'];
			
			}
		
		
		
		
		
		
		}
        ?>  
            <tr id="bordaforma002" >

              <td Id="<? echo $Classe; ?>"><?php echo $row['0']; ?></td>
              <td Id="<? echo $Classe; ?>"><?php echo date('d/m/Y',strtotime($row['1'])); ?></td>
              <td Id="<? echo $Classe; ?>"><?php echo  $row['2'];?></td>
			  <td Id="<? echo $Classe; ?>"><?php echo $row['3']+$row['4']; ?></td>
			 <td Id="<? echo $Classe; ?>"><?php echo $row['3']; ?></td>
			  <td Id="<? echo $Classe; ?>"><?php echo $row['4']; ?></td> 			  
            </tr>
         <? 
		 
		 
		 
		$T1=$T1+$row['2'];
		$T2=$T2+$row['3']+$row['4'];
		$T3=$T3+$row['3'];
		$T4=$T4+$row['4'];
		
		
		
		
		
		
		
		
		
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
		<td width="20"  id="FundoForm001">PREVI</td>
		<td width="20"  id="FundoForm001">CONFI</td>
		<td width="20"  id="FundoForm001">QUALI</td>
		<td width="20"  id="FundoForm001">REQUA</td>
		</tr>

		<tr>
		<td Id="FundoForm001"  ></TD>
		<td Id="FundoForm001"  ><? echo $T1+$T3+$T4; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $T1; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $T3+$T4; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $T3; ?></TD>
		<td Id="FundoForm001"  ><? ECHO $T4; ?></TD>
		</TR>
		<?
			
		sqlsrv_close($conn);

	
	
	
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


  
