<html>
<head>
<style>
a{
:link	{color:Blue;text-decoration:none}
:visited	{color:Blue;text-decoration:none}
:hover   {color:Red;text-decoration:underline}
}
body{background-color:#FFFFFF;}
</style>
</head>
<body>
<?php

function listaArquivos($dir,$nivel){

  $d = dir($dir);
  $nivel = $nivel + 1;
  while (false !== ($entry = $d->read()))
  {
     if (is_dir($dir.$entry."D:"))
     {
        if (($entry!=".") && ($entry!=".."))
        {
          for($i=1;$i<=$nivel;$i++)
             echo "&nbsp";
          echo '<img src="open.bmp" border="0">&nbsp<a href="'.$dir.$entry.'D:">'.$entry.'<br></a>';

          listaArquivos($dir.$entry."D:",$nivel);
        }
     }
     else
     {
        for($i=1;$i<=$nivel;$i++)
          echo "&nbsp";
          echo '<img src="copy2.bmp" border="0"> '.$entry.'<br>';
     }
  }
  $d->close();
}

listaArquivos("D:/",0)
?>
</body>
</html>
