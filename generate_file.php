<?php

require('pdf.php');

function decodificar($dat)
{
     return utf8_decode($dat);
}
//********************************************************************** */
$name = $_POST['nombre'];

$doctor = $_POST['doctor'];

$fecha = date('d/m/Y');

$doctor = decodificar($doctor);

//$name = 'Luis Güipe';

$name = decodificar($name);

$imagenurl =$_FILES['antes1']['name']; 

$path1 = 'images/';

/******************************************************** */

/***********Colores*********************************** */

$white = '255,255,255';

$pink = '255,107,132';


/******************************************************** */

$logo = 'Logo/logo2.jpeg';


$Now = date("Ymdsh");

//echo $Now; esta variable almacena la fecha en un formato creado

$pdf = new PDF('P', 'mm', 'Letter');

$pdf->AddPage();

$pdf->SetMargins(4,4);

//*************************Set app title */

$pdf->SetTitle('Click Dental Design',true);

//************************X   y   image width */


$pdf->Logo($logo);

$pdf->Title('Planeacion y Resumen del Caso',60,6);

$pdf->Ln(3);

$pdf->Membret('Doctor (A): ',$doctor,20);

$pdf->Membret('Paciente: ',$name,20);

$pdf->Membret('Fecha: ',$fecha,20);

$pdf->Ln(1);   $y1 = $pdf->GetY();

$pdf->Message('Antes',50,$pdf->GetY());

$pdf->Message('Despues',145,$y1);

$pdf->lef_image($path1,'antes1',$pdf->GetY(),90,62);

$pdf->right_image($path1,'despues1',$pdf->GetY(),90,62);

$pdf->Ln(2); 

$y1 = $pdf->GetY() + 65;  

$pdf->lef_image($path1,'antes2',$y1,80,50);

$pdf->right_image($path1,'despues2',$y1,80,50);

$pdf->SetY($y1);  $y1  = $pdf->GetY() + 54;

$pdf->lef_image($path1,'antes3',$y1,80,50);

$pdf->right_image($path1,'despues3',$y1,80,50);

$pdf->Output('I', $Now . '.pdf', true);


//***************************************** */
