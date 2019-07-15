<?php

namespace App\Http\Controllers;

use App\Utils\PDF;
use Anouar\Fpdf\Fpdf;
use App\Utils\PDF_MC_Table;
use App\Utils\PdfGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BillController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('bill/bill-input');
    }

    public function print(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:4',
            'price' => 'required|numeric'

        ]);

        return $request->price;
    }

    public function printBillPdf(Request $request)
    {
        $pdf = new PdfGenerator();
        $pdf->generate($request->getContent());
        exit;
        // return json_decode($request->getContent(), true);
    }

}
