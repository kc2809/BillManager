<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MyController extends Controller
{   

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    //
    public function XinChao(){
        // Test database connection
        return "wtf";
    }
}   
