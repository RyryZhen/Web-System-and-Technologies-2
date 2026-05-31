<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function form1(Request $request){
    $infos = $request->all();
    return view('grade',$infos);
    }
}
