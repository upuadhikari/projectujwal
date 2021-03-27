<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Expert;

class ExpertController extends Controller
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

        $data= Expert::orderBy('id','desc')->where('status',1)->get();
        return view('admin.experts.experts',compact('data'));
	    
       }

    public function addExpert()
    {
        return view('admin.experts.addform');
    }

    public function addNewExpert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
        ]);


        $extexpert = null;
        $extexpert = Expert::where('name', $request->name)->first();

        if ($extexpert) {
            $expert = $extexpert;
            if ($expert->status == 3) {
                $expert->name = $request->name;
                $expert->experience = $request->experience;
                $expert->mobile = $request->mobile;
                // $expert->mobile = $request->mobile;
                // $expert->role = $request->role;
                // $expert->status = $request->status;
                // $expert->password = Hash::make(12345678);

                if ($file = $request->file('profile_pic')) {
                    $uplodaDesc = $this->uploadFiles($file, 'members', $expert->id);
                    if(File::exists(storage_path('app/public/uploads/members/'). $expert->profile_pic)){
                        File::delete(storage_path('app/public/uploads/members/'). $expert->profile_pic);
                    }
                    if ( $uplodaDesc) {
                        $expert->profile_pic = $uplodaDesc['filename'];
                    }
                }

            } 
            else{
                $this->validate($request, [
                    'email' => 'required|unique:users',
                ]);
              
            }

        }

        else {
            
            $expert = new Expert;
            $expert->name = $request->name;
            // $expert->email = $request->email;
            $expert->mobile = $request->mobile;
            $expert->experience=$request->experience;

            if ($file = $request->file('profile_pic')) {
                $uplodaDesc = $this->uploadFiles($file, 'members', $expert->id);
                if(File::exists(storage_path('app/public/uploads/members/'). $expert->profile_pic)){
                    File::delete(storage_path('app/public/uploads/members/'). $expert->profile_pic);
                }
                if ( $uplodaDesc) {
                    $expert->profile_pic = $uplodaDesc['filename'];
                }
            }


        }


        if ($expert->save()) {

            return redirect('admin/experts/')->with('success', 'New User Added Successfully');
        }

        return redirect('admin/experts/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);

    }

   

    public function editExpert($id)
    {
        $expert = Expert::where('id', $id)->first();
        return view('admin.experts.editform', compact('expert'));
    }

    public function updateExpert(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email'=>'required',
            'mobile' => 'required',
        ]
        );

        $expert = Expert::findOrFail($id);
        $expert->name = $request->name;
        $expert->email = $request->email;
        $expert->mobile = $request->mobile;
        $expert->Experience= $request->role;
        $expert->status = $request->status;



        
        if ($user->save()) {
           
             return redirect('admin/users/')->with('success', 'User Updated Successfully.');


        }

        return redirect('admin/users/edit-user/' . $id)->with('errors', ['Sorry Some Error Occured.Please Try Again']);
    }


    public function deleteExpert($id)
    {
        $expert = Expert::findOrFail($id);
        $expert->status = 3;
        $result= $expert->save();

        $data= Expert::orderBy('id','desc')->where('status',1)->get();
        if ($result) {
        	return view('admin.user.userview',compact('data'));
        }
        
    }
}
