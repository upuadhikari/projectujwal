<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ForntEndProgramController extends Controller
{
    public function index(Request $request){

        $data= Program::orderBy('id','desc')->where('status','<=',1)->get();
        return view('frontend.index',compact('data'));
	 
       }
   

       public function service(Request $request){

        $data= Program::orderBy('id','desc')->where('status','<=',1)->get();
        return view('frontend.service',compact('data'));
	 
       }
       
       public function about(Request $request){
        $data= Program::orderBy('id','desc')->where('status','<=',1)->get();
        return view('frontend.about',compact('data'));
	  }
       
       
       public function blog(Request $request){
        $data= Program::orderBy('id','desc')->where('status','<=',1)->get();
        return view('frontend.blog',compact('data'));
	 }

     public function program(Request $request){
        $data= Program::orderBy('id','desc')->where('status','<=',1)->get();
        return view('frontend.program',compact('data'));
	 }

    public function viewProgram($id)
    {
        $program = Program::where('id', $id)->first();
        return view('programdetail', compact('program'));
    }


}
