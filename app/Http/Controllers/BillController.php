<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BillController extends Controller
{
    //

    public function index(Request $request) {
        return view('bill/bill');
    }

    public function print(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:4',
            'price' => 'required|numeric'

        ]);

        return $request->price;
    }
}
