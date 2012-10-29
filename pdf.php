<?php
  set_time_limit(180); //Este script pode ser lento
  //Cria nome de variáveis Abreviados
  $nome = $_POST['nome'];
  $score = $_POST['score'];
  
  function pdf_replace($pattern, $replacement, $string){
  	$len = strlen($pattern);
  	$regex = '';
  	
  	for($i = 0; $i < $len; $i++){
  		$regex .= $pattern[$i];
  		if($i < $len - 1){
  			$regex .= '(\)-?[0-9]+\( )?';
  		}
  		return ereg_replace($regex, $replacement, $string);
  	}
  }
  if(!$nome || !$score){
  	echo '<h1>Erro: Essa página foi chamada de maneira incorreta.</h1>';
  }
  else{
  	//gera os cabecalhos para ajudar o navegador a escolher a aplicacao correta
  	header('Content-Disposition: filename=cert.pdf');
  	header('Content-Type: application/pdf');
  	
  	$data = date('m-d-Y');
  	
  	//Abre Modelo
  	$arquivo = 'util/PHPCertificacao.pdf';
  	$saida = file_get_contents($arquivo);
  	
  	//Substitui os marcadores de lugar no modelo pelos nossos dados
  	
  	//$saida = pdf_replace('<<NAME>>',strtoupper($nome),$saida);
  	//$saida = pdf_replace('<<Name>>',$nome,$saida);
  	//$saida = pdf_replace('<<score>>',$score,$saida);
  	//$saida = pdf_replace('<<mm/dd/yyyy>>',$data,$saida);
  	
  	//$saida = str_replace('<<NAME>>',strtoupper($nome),$saida);
  	//$saida = str_replace('<<Name>>',$nome,$saida);
  	//$saida = str_replace('<<score>>',$score,$saida);
  	//$saida = str_replace('<<mm/dd/yyyy>>',$data,$saida);
  	
  	//Envia o documento gerado para o browser
  	
  	echo $saida;
  }
?>