<?php

function description_file_upload($file_name)
{

     $x_file = $_FILES[$file_name]['name'];

     $type = $_FILES[$file_name]['type'];

     $name = $_FILES[$file_name]['name'];

     $dat = $_FILES[$file_name]['tmp_name'];

     $size = $_FILES[$file_name]['size'];

     echo 'Nombre: ' . $x_file;
     echo '<hr>';
     echo 'Tipo: ' . $type;
     echo '<hr>';
     echo 'Nombre: ' . $name;
     echo '<hr>';
     echo 'Dato: ' . $dat;
     echo '<hr>';
     echo 'Tamaño: ' . $size;
     echo '<hr>';
}



require('FPDF/fpdf.php');

description_file_upload('image');

$file_name = 'image';

$x_file = $_FILES[$file_name]['name'];

$type = $_FILES[$file_name]['type'];

$name = $_FILES[$file_name]['name'];

$dat = $_FILES[$file_name]['tmp_name'];

$size = $_FILES[$file_name]['size'];


$path = 'images/';

$path = $path . basename($_FILES['image']['name']);



if (move_uploaded_file($dat, $path)) {
     echo 'Archivo Movido de forma exitosa';
} else
     echo 'Ha ocurrido un error';

unlink($path);

/*$doc = new FPDF('P','mm','Letter');

$doc->AddPage();

$doc->SetFont('Times', 'B', 14);

$doc->SetFillColor(255,255,255);

$doc->SetTextColor(255,107,132);

$doc->Cell(40,60,'Prueba',1,1,'C',true);

$doc->Ln(5);

//$doc->Image('images/image.png',10,15,50,60,'PNG');

$doc->Ln(5);

$doc->Cell(40,60,$x_file,0,1,'C',true);

//unlink('img.jpg');


$doc->Ln(5);

$doc->Output('I',  'f235.pdf',true);
*/
