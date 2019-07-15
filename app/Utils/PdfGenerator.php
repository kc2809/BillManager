<?php

namespace App\Utils;

use App\Utils\PDF;
use App\Utils\PDF_MC_Table;

class PdfGenerator
{
    public $pdf;

    function __construct()
    {
        // $this->pdf = new PDF();
        $this->pdf = new PDF_MC_Table();
    }

    public function generate($name)
    {
        $this->pdf->AddPage('L', 'A5');
        $this->pdf->SetFont('Ari', '', 12);
        $this->pdf->SetMargins(2, 2, 2);

        $this->createCustomerInfo();
        $this->createTable();
        // for ($i = 1; $i <= 5; $i++)
        //     $this->pdf->Cell(0, 10, 'TIN H?C HÀ NGUYÊN' . $i, 0, 1);
        $this->pdf->Output();
    }

    public function createCustomerInfo()
    {
        $this->pdf->SetY(35);
        $this->pdf->Cell(50, 5, 'Khách Hàng: A Quang', 1, 1, 'L');
        $this->pdf->Cell(50, 5, 'SDT: 123908129381390', 1, 2, 'L');
        $this->pdf->Cell(50, 5, 'Ðia Chi   :', 1, 2, 'L');
    }

    public function createTable()
    {
        $margin = 2;
        // real width after minus margin
        $w = $this->pdf->w - $margin * 2;

        // create widths by ratio
        $widthRatio = [1, 15, 1, 3, 3, 3];
        $sumWidth = 0;
        $widths = [];
        for ($i = 0; $i <= 5; $i++) {
            $sumWidth += $widthRatio[$i];
        }

        for ($i = 0; $i <= 5; $i++) {
            $widths[$i] = $w * $widthRatio[$i] / $sumWidth;
        }
        //

        $headers = ['STT', 'Ten Hang', 'SL', 'Don Gia', 'Thanh tien', 'Bao Hanh'];
        $this->pdf->SetY(53);
        $this->pdf->SetFont('Ari', 'B', 11);

        for ($i = 0; $i <= 5; $i++) {
            // $this->pdf->Cell(floor($w * $widthRatio[$i]) / 25, 5, $headers[$i], 1, 0, 'C');
            $this->pdf->Cell($widths[$i], 5, $headers[$i], 1, 0, 'C');
        }
        $this->pdf->Ln();


        //
        $this->pdf->SetWidths($widths);
        $data = [
            ['1', 'Máy ch? (Mainboard Gigabyte H110 DS2/ CPU Core I5 7500/ Ram 4GB/ HDD 1TB/ DVDRW/ Case Vision VSP/ Ngu?n Cooler Master
        400W)', '2', '8,600,000', '17,200,000', '12 thang'],
            ['1', 'Máy ch? (Mainboard Gigabyte)', '2', '8,600,000', '17,200,000', '12 thang']
        ];

        $this->pdf->SetFont('Ari', '', 12);

        foreach ($data as $row) {
            $this->pdf->Row($row);
        }

        $this->pdf->SetWidths([80, 80, 80]);
        $this->pdf->Row(['HAHADSLFKJSLKFJ','aslkfjalksjfklsad','asflkjsflkjsaklfjklsdjfklsd']);
    }
}
