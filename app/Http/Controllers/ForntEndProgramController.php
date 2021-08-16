<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Expert;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;



class ForntEndProgramController extends Controller
{
    public function index(Request $request)
    {

        $data = Program::orderBy('id', 'desc')->where('status', '<=', 1)->get();
        return view('frontend.index', compact('data'));
    }


    public function service(Request $request)
    {

        $data = Program::orderBy('id', 'desc')->where('status', '<=', 1)->get();
        return view('frontend.service', compact('data'));
    }

    public function about(Request $request)
    {
        $data = Expert::orderBy('id', 'desc')->where('status', '<=', 1)->get();
        return view('frontend.about', compact('data'));
    }


    public function blog(Request $request)
    {
        $data = Program::orderBy('id', 'desc')->where('status', '<=', 1)->get();
        return view('frontend.blog', compact('data'));
    }

    public function program(Request $request)
    {
        $data = Program::orderBy('id', 'desc')->where('status', '<=', 1)->get();
        return view('frontend.program', compact('data'));
    }

    public function viewProgram($id)
    {
        $program = Program::orderBy('id', 'desc')->where('status', '<=', 1)->first();
        $comments = Comment::where('status', 1)->where('program_id', $id)->with('user')->orderby('created_at', 'desc')->get();
        return view('frontend.programdetail', compact('program', 'comments'));
    }

    public function Comment(Request $request, $id)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->program_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->user_name = Auth::user()->name;
        $program = Program::where('id', $id)->first();
        if ($comment->save()) {
            $comments = Comment::where('status', 1)->where('program_id', $id)->with('user')->orderby('created_at', 'desc')->first();

            return redirect('view-program/' . $id);
        }
    }

    public function deletecomment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        $program = Program::where('id', $id);
        return redirect('view-program/' . $id);
    }
}
