<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;
use Auth;

class ProgramController extends Controller
{
    public function __construct()
    {
    	$this->middleware(function ($request, $next) {  
        if (!Auth::user()->role == 3) {
        	dd("error");
            abort(404);
        }
            return $next($request);
        });
    }
    public function index(Request $request){

        $data= Program::orderBy('id','desc')->where('status','<=',1)->paginate(5);
        return view('admin.program.program',compact('data'));
	}

    public function addprogram()
    {
        return view('admin.program.addform');
    }

    public function addNewProgram(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
        ]);


            $program = new Program;
            $program->name = $request->name;
            $program->detail = $request->detail;
            if ($request->hasFile('picture')) {
                $request->validate([
                    'picture' =>'mimes:jpg,png,bmp',
                ]);
                $image = $request->file('picture');
                $imgExt = $image->getClientOriginalExtension();
                $fullname = time().".".$imgExt;
                $result = $image->storeAs('images/',$fullname);
            }

        else{
            $fullname = "avatar7.png";              
        }

        $program->picture = $fullname;
           

        if ($program->save()) {
            return redirect('admin/programs/')->with('success', 'New Program added Successfully');
        }

        return redirect('admin/prorgams/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);

    }

   

    public function editProgram($id)
    {
        $program = Program::where('id', $id)->first();
        return view('admin.program.editform', compact('program'));
    }
    public function updateprogram(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
        ]
        );
      
       
        $program =  Program::findorfail($id);
        $program->name = $request->name;
        $program->detail = $request->detail;
        $program->picture = $request->picture;

        
        
        if ($program->save()) {
            
           
             return redirect('admin/programs/')->with('success', 'User Updated Successfully.');


        }

        return redirect('admin/programs/edit-program/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);
    }


    public function deleteprogram($id)
    {
        $program = Program::findOrFail($id);
        $program->status = 3;
        $result = $program->save();

        $data= Program::orderBy('id','desc')->where('status','<=',1)->get();
        if ($result) {
            return redirect('/admin/programs');
        }
        
    }
    public function searchProgram(Request $request){

        $searched=$request->searched;
        $data= Program::Where('name','Like',"%$searched%")->get();
        return view('admin.program.searchprogram',compact('data','searched'));
    }
    
}
