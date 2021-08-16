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
    public function index(Request $request)
    {

        $data = Expert::orderBy('id', 'desc')->where('status', 1)->paginate(5);
        return view('admin.experts.experts', compact('data'));
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

                if ($file = $request->file('profile_pic')) {
                    $uplodaDesc = $this->uploadFiles($file, 'members', $expert->id);
                    if (File::exists(storage_path('app/public/uploads/members/') . $expert->profile_pic)) {
                        File::delete(storage_path('app/public/uploads/members/') . $expert->profile_pic);
                    }
                    if ($uplodaDesc) {
                        $expert->profile_pic = $uplodaDesc['filename'];
                    }
                }
            } else {
                $this->validate($request, [
                    'email' => 'required|unique:users',
                ]);
            }
        } else {

            $expert = new Expert;
            $expert->name = $request->name;
            // $expert->email = $request->email;
            $expert->mobile = $request->mobile;
            $expert->experience = $request->experience;
            if ($request->hasFile('picture')) {
                $request->validate([
                    'picture' => 'mimes:jpg,png,bmp',
                ]);
                $image = $request->file('picture');
                $imgExt = $image->getClientOriginalExtension();
                $fullname = time() . "." . $imgExt;
                $result = $image->storeAs('images/', $fullname);
            } else {
                $fullname = "avatar7.png";
            }
            $expert->profile_pic = $fullname;
        }

        if ($expert->save()) {

            return redirect('admin/experts/')->with('success', 'New Expert Added Successfully');
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
        $this->validate(
            $request,
            [
                'name' => 'required',
                'experience' => 'required',
                'mobile' => 'required',
            ]
        );

        $expert = Expert::findOrFail($id);
        $expert->name = $request->name;
        $expert->mobile = $request->mobile;
        $expert->experience = $request->experience;




        if ($expert->save()) {

            return redirect('admin/experts/')->with('success', 'Expert Updated Successfully.');
        }

        return redirect('admin/experts/edit-experts/' . $id)->with('errors', ['Sorry Some Error Occured.Please Try Again']);
    }


    public function deleteExpert($id)
    {
        $expert = Expert::findOrFail($id);
        $expert->status = 3;
        $result = $expert->save();

        $data = Expert::orderBy('id', 'desc')->where('status', 1)->get();
        if ($result) {
            return view('admin.user.userview', compact('data'));
        }
    }
}
