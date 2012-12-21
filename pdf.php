<?php
  set_time_limit(180); //Este script pode ser lento
  //Cria nome de variáveis Abreviados
  $nome = $_POST['nome'];
  $score = $_POST['score'];
  
  function pdf_replace( $pattern, $replacement, $string )
  {
    $len = strlen( $pattern );
    $regexp = '';
    for ( $i = 0; $i<$len; $i++ )
    {
      $regexp .= $pattern[$i];
      if ($i<$len-1)
        $regexp .= "(\)\-{0,1}[0-9]*\(){0,1}";
    }
    return ereg_replace ( $regexp, $replacement, $string );
  }
  if(!$nome || !$score){
  	echo '<h1>Erro: Essa página foi chamada de maneira incorreta Ops!.</h1>';
  }
  else{
  	//gera os cabecalhos para ajudar o navegador a escolher a aplicacao correta
  	header('Content-Disposition: filename=cert.pdf');
  	header('Content-Type: application/pdf');
  	
  	$data = date('m-d-Y');
  	
  	//Abre Modelo
  	$arquivo = 'util/PHPCertificacao3.pdf';
//   	$saida = file_get_contents($arquivo);
  	

	if(!$fp = fopen ( $arquivo, 'r' )){
         echo 'Ocorreu um erro';
        }
        else{
	  //read our template into a variable
	  $saida = fread( $fp, filesize( $arquivo ) );

	  fclose ( $fp );

	// replace the place holders in the template with our data
	  $saida = str_replace( '<<NAME>>', strtoupper( $nome ), $saida );
	  $saida = str_replace( '<<Name>>', $nome, $saida );
	  $saida = str_replace( '<<score>>', $score, $saida );
	  $saida = str_replace( '<<mm/dd/yyyy>>', $data, $saida );
	  
	  echo $saida;
        }
  }
?>