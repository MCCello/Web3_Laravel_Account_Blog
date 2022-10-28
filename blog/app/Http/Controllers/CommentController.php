<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function commentz (Request $request)
    {
        $this->validate($request,['message' => 'required']);
     
        $comment = new Comment;
        $comment->message = $request->input('message');
        $comment->author = Auth::user()->id;
        $comment->post_id = $request->input('post_id');
        
        $comment->save();

        return redirect()->back()->with('success' ,'Comment Added Succesfully');


    }
}
