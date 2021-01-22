<?php
	 require __DIR__ . '../../Nucleo/buscaviacep/src/BuscaViaCEP_inc.php';
	 //usar o helper
     use Jarouche\ViaCEP\HelperViaCep;
	 
     //tipos permitidos
     $array_tipos =['Querty','Piped','JSON','JSONP','XML'];
     
     $class_cep =array();
     // testando todos os tipos de requisição
     foreach ($array_tipos as $tipo){
         //helper retorna da dados do cep através dos parâmetros tipo e cep  
         $class_cep = HelperViaCep::getBuscaViaCEP($tipo,'22031050');
        //   print_r($class_cep);
           
           
     }





     //$json = array();
     //$json = json_decode($class_cep);
      //echo $json['networkConnections'];
     
    // var_dump($class_cep);
    
      //foreach ($class_cep['result'] as $linha){
		//echo  $linha."<br/>"."casa:";
		//$endereco=$linha;
		  ////  echo PHP_EOL;
		////echo $linha['logradouro'];
		//} 
		
		
		
		
		
		
		
     //Utilizando via Classe
    $class = new Jarouche\ViaCEP\BuscaViaCEPJSONP();
    /*como é JSONP, existe a opção de setar o nome da callback function, 
     * ESTÁ OPÇÃO ESTÁ SOMENTE DISPONÍVEL SE UTILIZAR A CLASSE Jarouche\ViaCEP\BuscaViaCEPJSONP();
     */
    $class->setCallbackFunction('teste_teste');
    
    //Faz o retorno do CEP
    $result = $class->retornaCEP('22031050');
   // echo $class->retornaConteudoRequisicao();
  //  print_r($result);
        $endereco ="teste";
    foreach ($result as $linha){
		//echo $linha.",";
		$endereco=$linha;
	}

		echo $endereco;
   /* for($i=0;$result>$i;$i++){
		
		echo $result[$i];
		
		
		
		}*/
    
    
    
    
    
    
    
     
   
