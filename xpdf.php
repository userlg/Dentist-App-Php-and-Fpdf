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

//description_file_upload('image');

$file_name = 'antes1';

$x_file = $_FILES[$file_name]['name'];

$type = $_FILES[$file_name]['type'];

$name = $_FILES[$file_name]['name'];

$dat = $_FILES[$file_name]['tmp_name'];

$size = $_FILES[$file_name]['size'];

// El directorio images es uno temporal que se ha creado para procesar las imagenes mientras se genera el reporte


$path1 = 'images/';



/*if (move_uploaded_file($dat, $path)) {
     echo 'Archivo Movido de forma exitosa';
} else
     echo 'Ha ocurrido un error';
*/


$doc = new FPDF('P','mm','Letter');

$doc->AddPage();

$doc->SetFont('Times', 'B', 14);

$doc->SetFillColor(255,255,255);

$doc->SetTextColor(255,107,132);

$doc->Cell(40,60,'Prueba',1,1,'C',true);

$doc->Ln(5);

$doc->SetFont('Times', 'B', 22);

$doc->SetTextColor(000000);

$posy = $doc->GetY();

$doc->Cell(150,25,'             Antes                               Despues',0,1,true);  

$doc->Ln(1);

$path = $path1 . basename($_FILES['antes1']['name']);

move_uploaded_file($dat, $path);


$doc->Image($path, $doc->GetX() + 10, $doc->GetY(),70);

unlink($path); // Se borra la imagen despues de insertarla en el reporte

$doc->Ln(5);


$doc->Output('I', 'f235.pdf',true);

unlink($path);

