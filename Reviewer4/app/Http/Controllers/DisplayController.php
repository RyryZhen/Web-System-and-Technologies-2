<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function display(Request $request){
        $name = $request->name;
        return view('display', compact('name'));
    }
}
