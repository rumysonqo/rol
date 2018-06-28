<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ctrl_calendario extends Controller
{
    //
    public function index()
    {
        //
        return view('calendario.view_index_calendario');
    }

    public function grabar(Request $request)
    {
        //
       //dd('grabar');
    }
}
