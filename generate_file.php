<?php
require('FPDF/fpdf.php');

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
}

//********************************************************************** */

$name = $_POST['nombre'];

$doctor = 'Armando Pérez';

$fecha = date('d/m/Y');

$doctor = decodificar($doctor);

$name = 'Luis Güipe';

$name = decodificar($name);



/******************************************************** */


/***********Colores*********************************** */

$white = '255,255,255';

$pink = '255,107,132';

/******************************************************** */

$logo = 'logo2.jpeg';


$Now = date("Ymdsh");

//echo $Now; esta variable almacena la fecha en un formato creado

$pdf = new PDF('P', 'mm', 'Letter');

$pdf->AddPage();

$pdf->SetMargins(4,4);

//*************************Set app title */

$pdf->SetTitle('Click Dental Design',true);

//************************X   y   image width */
$pdf->Image($logo, 160, 10, 40);

$pdf->SetFont('Times', 'B', 14);

$pdf->SetFillColor(255,107,132);

$pdf->SetTextColor(255,255,255);

$pdf->SetX(5);

$pdf->Text(5,10,'Prueba');

//$pdf->RoundedRect(5, 12, 90, 7, 2, 'D');

$pdf->Cell(100, 12, 'Doctor: '. $doctor, 0, 1, 'C', true);

$pdf->Ln(1);

$pdf->SetX(5);

$pdf->Cell(100, 12,'Paciente: '. $name, 0, 1, 'C', true);

$pdf->Ln(1);

$pdf->SetX(5);

$pdf->Cell(100, 12, "Fecha: ". $fecha, 0, 1, "C", TRUE);

$pdf->Output('I', $Now . '.pdf', true);
