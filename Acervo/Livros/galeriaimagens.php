<?php
$pag=$_GET['pag'];
if(!$pag)
{
	$pag=1;
}

$rpp=6; //Quantidade de imagens por página
$inicio=$pag * $rpp - $rpp;

//PASTA DAS IMAGENS

$dir = ("../exemplos/imagens/");
$abrir = opendir($dir);
$arquivos = array();
//LOCALIZA APENAS AS IMAGENS QUE INICIAM COM p
foreach (glob($dir."*") as $file)
{
	if (($file != '.') && ($file != '..'))
	{
		//FORMATO DAS IMAGENS
		if ((!is_dir($file)) && (eregi('(jpeg|jpg|bmp)$', $file)))
		{
			$arquivos[] = $file;
		}
	}
}

$total = count($arquivos);		//total de arquivos
$paginas = ceil ($total/$rpp);  //arquivos por pagina 30/10=3

echo "<p>";
for ($i = $inicio; $i < $inicio+$rpp && $i < $total; $i++)
{
	if ($i%5==0)
	{
		//PEGA A PROPORÇÃO DA IMAGEM
		$imgsize = GetImageSize ("$arquivos[$i]");
		$img_w = 100; //$imgsize[0];
		$img_h = 100; //$imgsize[1];
		$img_x = $imgsize[0];
		$img_y = $imgsize[1];
		echo '<fieldset style="width: 105px; height: 130px"><legend><input type="radio" class="radio" name="arquivo" id="'.$arquivos[$i].'" value="'.$arquivos[$i].'"><label for='.$arquivos[$i].'>Imagem '.$i.'</label></legend><img alt="" src="'.$arquivos[$i].'" width="'.$img_w.'" height="'.$img_h.'" class="ampliarimagem" onClick="window.open(\''.$arquivos[$i].'\',\'imagem'.$i.'\',\'width='.$img_x.',height='.$img_y.',location=no,menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no\')"/></fieldset>  ';
	}
	else
	{
		//PEGA A PROPORÇÃO DA IMAGEM
		$imgsize = GetImageSize ("$arquivos[$i]");
		$img_w = 100; //$imgsize[0];
		$img_h = 100; //$imgsize[1];
		$img_x = $imgsize[0];
		$img_y = $imgsize[1];
		echo '<fieldset style="width: 105px; height: 130px"><legend><input type="radio" class="radio" name="arquivo" id="'.$arquivos[$i].'" value="'.$arquivos[$i].'"><label for='.$arquivos[$i].'>Imagem '.$i.'</label></legend><img alt="" src="'.$arquivos[$i].'" width="'.$img_w.'" height="'.$img_h.'" class="ampliarimagem" onClick="window.open(\''.$arquivos[$i].'\',\'imagem'.$i.'\',\'width='.$img_x.',height='.$img_y.',location=no,menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no\')"/></fieldset>  ';
	}
}
echo "</p>";

if ($pag > 1)
{
	$ant = $pag - 1;
	echo '<p class="align-right"><br /><a href="'.$PHP_SELF.'?pag='.$ant.'"><u>Anterior</u></a>';
}
else
{
	echo '<p class="align-right"><br />Anterior';
}

if ($pag < $paginas)
{
	$pro = $pag + 1;
	echo ' <a href="'.$PHP_SELF.'?pag='.$pro.'"><u>Próximo</u></a></p>';
}
else
{
	echo ' Próximo</p>';
}
echo'</div>';
?>
