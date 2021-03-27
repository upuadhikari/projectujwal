<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ForntEndProgramController extends Controller
{
    public function index(Request $request){

        $data= Program::orderBy('id','desc')->where('status','<=',1)->get();
        return view('index',compact('data'));
	 
       }
   

    public function viewProgram($id)
    {
        $program = Program::where('id', $id)->first();
        return view('programdetail', compact('program'));
    }


}
