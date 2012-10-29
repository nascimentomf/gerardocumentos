<?php
  //Cria nome de variáveis Abreviados
  $nome = $_POST['nome'];
  $score = $_POST['score'];
  
  if(!$nome || !$score){
  	echo '<h1>Erro: Essa página foi chamada de maneira incorreta.</h1>';
  }
  else{
  	//gera os cabecalhos para ajudar o navegador a escolher a aplicacao correta
  	header('Content-Type: application/msword');
  	header('Content-Disposition: inline, filename=cert.rtf');
  	
  	$data = date('m-d-Y');
  	
  	//Abre Modelo
  	$arquivo = 'util/PHPCertificacao.rtf';
  	$saida = file_get_contents($arquivo);
  	
  	//Substitui os marcadores de lugar no modelo pelos nossos dados
  	
  	$saida = str_replace('<<NAME>>',strtoupper($nome),$saida);
  	$saida = str_replace('<<Name>>',$nome,$saida);
  	$saida = str_replace('<<score>>',$score,$saida);
  	$saida = str_replace('<<mm/dd/yyyy>>',$data,$saida);
  	
  	//Envia o documento gerado para o browser
  	
  	echo $saida;
  }
?>