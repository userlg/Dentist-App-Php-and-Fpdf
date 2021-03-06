<?php
require('FPDF/fpdf.php');

//echo '<link rel="icon" type="icon" href="Logo/logo.png" />';

function decodificar($dat)
{
     return utf8_decode($dat);
}


class PDF extends FPDF
{
     function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '')
     {
          $k = $this->k;
          $hp = $this->h;
          if ($style == 'F')
               $op = 'f';
          elseif ($style == 'FD' || $style == 'DF')
               $op = 'B';
          else
               $op = 'S';
          $MyArc = 4 / 3 * (sqrt(2) - 1);
          $this->_out(sprintf('%.2F %.2F m', ($x + $r) * $k, ($hp - $y) * $k));

          $xc = $x + $w - $r;
          $yc = $y + $r;
          $this->_out(sprintf('%.2F %.2F l', $xc * $k, ($hp - $y) * $k));
          if (strpos($corners, '2') === false)
               $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - $y) * $k));
          else
               $this->_Arc($xc + $r * $MyArc, $yc - $r, $xc + $r, $yc - $r * $MyArc, $xc + $r, $yc);

          $xc = $x + $w - $r;
          $yc = $y + $h - $r;
          $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - $yc) * $k));
          if (strpos($corners, '3') === false)
               $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - ($y + $h)) * $k));
          else
               $this->_Arc($xc + $r, $yc + $r * $MyArc, $xc + $r * $MyArc, $yc + $r, $xc, $yc + $r);

          $xc = $x + $r;
          $yc = $y + $h - $r;
          $this->_out(sprintf('%.2F %.2F l', $xc * $k, ($hp - ($y + $h)) * $k));
          if (strpos($corners, '4') === false)
               $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - ($y + $h)) * $k));
          else
               $this->_Arc($xc - $r * $MyArc, $yc + $r, $xc - $r, $yc + $r * $MyArc, $xc - $r, $yc);

          $xc = $x + $r;
          $yc = $y + $r;
          $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - $yc) * $k));
          if (strpos($corners, '1') === false) {
               $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - $y) * $k));
               $this->_out(sprintf('%.2F %.2F l', ($x + $r) * $k, ($hp - $y) * $k));
          } else
               $this->_Arc($xc - $r, $yc - $r * $MyArc, $xc - $r * $MyArc, $yc - $r, $xc, $yc - $r);
          $this->_out($op);
     }

     function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
     {
          $h = $this->h;
          $this->_out(sprintf(
               '%.2F %.2F %.2F %.2F %.2F %.2F c ',
               $x1 * $this->k,
               ($h - $y1) * $this->k,
               $x2 * $this->k,
               ($h - $y2) * $this->k,
               $x3 * $this->k,
               ($h - $y3) * $this->k
          ));
     }

     function Title($titulo,$x,$y){

          $this->SetFont('Arial','B',18);

          $this->SetTextColor(0,0,0);  //Negro

          $this->SetFillColor(255,255,255); //Blanco

          $this->SetY($y);  $this->SetX($x);

          $this->Cell(80,14,$titulo, 0,1, 'C',true);

     }

     function Logo($logo){

          $this->Image($logo, 162, 6, 40);
     }


     function Membret($type,$dat,$x){

$this->SetFillColor(255,107,132);

$this->SetFont('Times', 'B', 14);


$this->SetTextColor(255,255,255);

$this->SetX($x);  


$this->Cell(90, 13, $type. $dat, 0, 1, 'C', true);


$this->Ln(1);
     }
}

//********************************************************************** */

$name = $_POST['nombre'];

$doctor = 'Armando Pérez';

$fecha = date('d/m/Y');

$doctor = decodificar($doctor);

$name = 'Luis Güipe';

$name = decodificar($name);

$imagenurl =$_FILES['antes1']['name']; 

$path1 = 'images/';

$dat = $_FILES['antes1']['tmp_name'];




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

$pdf->Membret('Doctor: ',$doctor,20);

$pdf->Membret('Paciente: ',$name,20);

$pdf->Membret('Fecha: ',$fecha,20);

$pdf->Ln(3);

$path = $path1 . basename($_FILES['antes1']['name']);

move_uploaded_file($dat, $path);


$pdf->Image($path,$pdf->GetX()+ 20 ,$pdf->GetY()+5,70,50);

unlink($path);

//********************Segunda Imagen */

$path = $path1 . basename($_FILES['despues1']['name']);

$dat = $_FILES['despues1']['tmp_name'];

move_uploaded_file($dat, $path);

$pdf->Image($path,$pdf->GetX()+ 115 ,$pdf->GetY()+5,70,50);

unlink($path);

$pdf->Output('I', $Now . '.pdf', true);
