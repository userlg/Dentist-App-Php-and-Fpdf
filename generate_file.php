<?php
/*********************************************************/

$name = $_POST['nombre'];

/******************************************************** */

require ('FPDF/fpdf.php');

$Now = date("Ymdsh");  

//echo $Now; esta variable almacena la fecha en un formato creado

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(40,10,'Hola, Fpdf desde php');

$pdf->Ln();

$pdf->Cell(40,10,$name);

$pdf->Output('I',$Now.'.pdf',true);

?>