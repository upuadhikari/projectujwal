<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;




class UserController extends Controller
{
	 public function __construct()
    {
    	
    }
    public function index(Request $request){

        $data= User::orderBy('id','desc')->where('status',1)->paginate(5);
        return view('admin.user.userview',compact('data'));
	}

    public function addUser()
    {
        return view('admin.user.addform');
    }

    public function addNewUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);


        $extUser = null;
        $extuser = User::where('email', $request->email)->first();

        if ($extuser) {
            $user = $extuser;
            if ($user->status == 3) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->mobile = $request->mobile;
                $user->role = $request->role;
                $user->status = $request->status;
                $user->password = Hash::make(12345678);

                if ($request->hasFile('profile_pic')) {
                    $request->validate([
                        'profile_pic' =>'mimes:jpg,png,bmp',
                    ]);
                    $image = $request->file('profile_pic');
                    $imgExt = $image->getClientOriginalExtension();
                    $fullname = time().".".$imgExt;
                    $result = $image->storeAs('images/',$fullname);
                }
    
            else{
                $fullname = "default.jpg";              
            }
    
            $user->profile_pic = $fullname;
            } 
            else{
                $this->validate($request, [
                    'email' => 'required|unique:users',
                ]);
              
            }

        }

        else {
            
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->mobile = $request->mobile;
            $user->role = $request->role;
            $user->status = $request->status;

            $user->password = Hash::make(12345678);

            if ($file = $request->file('profile_pic')) {
                $request->validate([
                    'profile_pic' =>'mimes:jpg,png,bmp',
                ]);
                $image = $request->file('profile_pic');
                $imgExt = $image->getClientOriginalExtension();
                $fullname = time().".".$imgExt;
                $result = $image->storeAs('images',$fullname);

                }
            else{
                $fullname ="default.jpg";
            }
            $user->profile_pic = $fullname;


        }


        if ($user->save()) {

            return redirect('admin/users/')->with('success', 'New User Added Successfully');
        }

        return redirect('admin/users/')->with('errors', ['Sorry Some Error Occured.Please Try Again']);

    }

   

    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.editform', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]
        );

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->role = $request->role;
        $user->status = $request->status;



        
        if ($user->save()) {
           
             return redirect('admin/users/')->with('success', 'User Updated Successfully.');


        }

        return redirect('admin/users/edit-user/' . $id)->with('errors', ['Sorry Some Error Occured.Please Try Again']);
    }


    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 3;
        $result = $user->save();

        $data= User::orderBy('id','desc')->where('status',1)->get();
        if ($result) {
        	return redirect('/admin/users');
        }

    }

    public function searchUser(Request $request){

        $searched=$request->searched;
        $data= User::where('status','<',3)->orWhere('name','Like',"%$searched%")->orWhere('email','Like',"%$searched%")->orWhere('mobile','Like',"%$searched%")->get();
        return view('admin.user.searchuserview',compact('data','searched'));
    }
    
}

