<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <title>Dentist App</title>
</head>
<body>

<?php

  require ('FPDF/fpdf.php');

  echo '<h2> Hola desde Php </h2>';

$pdf=new FPDF();
//Primera página
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(40,10,'¡Mi primera página pdf con FPDF!');

#$pdf->Image('leon.jpg' , 80 ,22, 35 , 38,'JPG', 'http://www.desarrolloweb.com');
$pdf->Close();

$pdf->Output();

 ?>
     
</body>
</html>