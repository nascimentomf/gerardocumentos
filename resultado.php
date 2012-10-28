<?php
  //Cria nome de Variaveis abreviados
  $cert_opc1 = $_POST['cert_opc1'];
  $cert_opc2 = $_POST['cert_opc2'];
  $cert_opc3 = $_POST['cert_opc3'];
  $cert_nome = $_POST['cert_nome'];
  
  //Verifica se todos os dados foram recebidos
  if($cert_opc1 == '' || $cert_opc2 == '' || $cert_opc3 == '' || $cert_nome == ''){
  	echo '<h1>Desculpe: Voc� precisa preencher seu nome e responder a todas as quest�es.</h1>';
  }
  else{
  	//acrescenta os scores
  	$score = 0;
  	if($cert_opc1 == 1){
  		$score++;
  	}
    if($cert_opc2 == 1){
  		$score++;
  	}
    if($cert_opc3 == 1){
  		$score++;
  	}
  	
  	//Converte pontua��o para uma percentagem
  	
  	$score = ($score / 3) * 100;
  	
  	if($score < 50){
  		//Foi reprovado
  		echo '<h1>Desculpe: Voc� precisa obter um resultado de no m�nimo 50% para ser aprovado.</h1>';
  	}
  	else{
  		$score = number_format($score,1);
  		echo '<h1>Parab�ns: Muito bom '.$cert_nome.', voc� foi aprovado com um score de '.$score.'%. Voc� foi aprovado no exame.</h1>';
  		//Fornece link para gerar pdf
  		echo 'Clique aqui para gerar o certificado (PDF)';
  		?>
  		<form action="pdf.php" method="post">
  		  <input type="hidden" name="score" value="<?php echo $score;?>"/>
  		  <input type="hidden" name="nome" value="<?php echo $cert_nome;?>"/>
  		  <input type="submit" value="Gerar" />
  		</form>
  		<?php
  	}
  }
?>