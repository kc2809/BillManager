<?php

namespace App\Utils;

use Anouar\Fpdf\Fpdf;

class PDF_MC_Table extends FPDF
{
    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 5, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

    function Header()
    {
        // Logo
        $this->Image('logohn.jpg', 1, 1, 28);
        $this->AddFont('Time_New_Roman', '', 'times-new-roman.php');
        $this->AddFont('Ari', '', 'arial.php');
        $this->AddFont('Ari', 'B', 'arialbd.php');
        $this->AddFont('Ari', 'I', 'ariali.php');

        // Arial bold 15
        $this->SetFont('Ari', '', 17);
        // Move to the right
        $this->SetXY(30, 3);
        // Title
        $this->Cell(130, 5, 'CÔNG TY TNHH TIN HOC HÀ NGUYÊN', 1, 1, 'L');
        $this->SetFont('Ari', '', 11);
        $this->SetXY(30, 9);
        $this->Cell(130, 5, 'DC 23980140 quan phu nhuan ', 1, 1, 'L');
        $this->SetXY(30, 15);
        $this->Cell(130, 5, 'DT 23980140 quan phu nhuan ', 1, 1, 'L');
        $this->SetXY(30, 21);
        $this->Cell(130, 5, 'Website: Ha nguyen computer ', 1, 1, 'L');

        // right blog
        $this->SetXY(165, 7);
        $this->Cell(40, 5, 'So CT: 323123HN1 ', 1, 1, 'L');
        $this->SetXY(165, 13);
        $this->Cell(40, 5, 'Ngay: 01/07/2019', 1, 1, 'L');
        $this->SetXY(165, 19);
        $this->Cell(40, 5, 'Kho: 01/07/2019', 1, 1, 'L');

        $this->SetFont('Ari', '', 15);
        $this->SetXY($this->w / 2 - 40, 29);
        $this->Cell(80, 5, 'PHIEU GIAO HANG', 1, 1, 'C');
        // Line break
        $this->Ln(20);
    }
}
