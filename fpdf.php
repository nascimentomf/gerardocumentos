<?php
  //Possibila correta operacao IE
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename=cert.pdf');
  
  //Inclui arquivo com classe
  require 'util/fpdf/fpdf.php';
  
  //Instancia a classe
  $pdf = new FPDF();
  
  //Inicia o arquivo
  $pdf->Open();
  
  //Inicia uma nova pagina
  $pdf->AddPage();
  
  //Define posicao Cursor
  $pdf->SetXY(30, 50);
  
  //Seta a fonte para Helveltica (negrito e tamanho 16)
  $pdf->SetFont('Helvetica','B',16);
  
  //Escreve uma celula (campo) com o conteudo
  $pdf->Cell(0,6,'PHP Certificacao',0,3);
  
  //Escreve uma celula (campo) com o conteudo
  
  $pdf->Cell(0,6,'(PDF gerado atraves classe FPDF)',0,3);
  
  //Gera saida browser
  $pdf->Output();
?>