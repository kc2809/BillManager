<?php

namespace App\Utils;

use Anouar\Fpdf\Fpdf;

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   $this->Image('logohn.jpg',1,1,28);
   $this->AddFont('Time_New_Roman','', 'times-new-roman.php');
   $this->AddFont('Ari','', 'arial.php');
   $this->AddFont('Ari','B', 'arialbd.php');
   $this->AddFont('Ari','I', 'ariali.php');

    // Arial bold 15
    $this->SetFont('Ari','',17);
    // Move to the right
    $this->SetXY(30,3);
    // Title
    $this->Cell(130,5,'CÔNG TY TNHH TIN HOC HÀ NGUYÊN',1,1,'L');
    $this->SetFont('Ari','',11);
    $this->SetXY(30, 9);
    $this->Cell(130,5,'DC 23980140 quan phu nhuan ',1,1,'L');
    $this->SetXY(30, 15);
    $this->Cell(130,5,'DT 23980140 quan phu nhuan ',1,1,'L');
    $this->SetXY(30, 21);
    $this->Cell(130,5,'Website: Ha nguyen computer ',1,1,'L');

    // right blog
    $this->SetXY(165, 7);
    $this->Cell(40,5,'So CT: 323123HN1 ',1,1,'L');
    $this->SetXY(165, 13);
    $this->Cell(40,5,'Ngay: 01/07/2019',1,1,'L');
    $this->SetXY(165, 19);
    $this->Cell(40,5,'Kho: 01/07/2019',1,1,'L');

    $this->SetFont('Ari','',15);
    $this->SetXY($this->w/2 - 40, 29);
    $this->Cell(80,5,'PHIEU GIAO HANG',1,1,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
  //  $this->SetY(-15);
    // Arial italic 8
 //   $this->SetFont('Time_New_Roman','B',8);
    // Page number
  //  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
