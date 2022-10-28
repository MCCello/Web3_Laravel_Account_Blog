<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Post;
use Illuminate\Http\Request;
//this might be kinda repetitive actually but oh well we want a ten :P

class PostsAPI extends Controller
{
    //get all posts
    public function post(){
        return response()->json(Post::get(),200);
    }

     //Post by id
     public function postById($id){
        $post = Post::find($id);

        if($post == null){
            return response()->json('No Post with ID',404);
            
        }

        return response()->json(Post::find($id),200);
    }

    //post a new post - valga la redundancia
    public function postSave(Request $request){
        $rules = ['title' => 'required | max:50'];
        //authenticator for title

        $post = new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->author=$request->author;
        

        $v = Validator::make($request->all(),$rules);

        if ($v->fails()){
           return response()->json($v->errors(),400);
        }

        $post->save();
        return response()->json($post,201);
    }
    
    //if checks to update no values, one value, or all values cause that shi* annoying
    public function postUpdate(Request $request, $id){
        $post = Post::find($id);
        
        if($request->input('title')==null){
            
            $post->title = $post->title;
        }else{
            $post->title = $request->input('title');
        }
        if($request->input('body')==null)
        {
            $post->body = $post->body;
        }else{
            $post->body = $request->input('body');
        }
        if($request->input('author')==null){

            $post->author = $post->author;

        }else{
            $post->author = $request->input('author');
        }

        $post->save();
        return response()->json('Post Updated',200);
    }
    //deletes by ID
    public function postDelete(Request $request, $id){
        
        $post = Post::find($id);
        $post->delete();

        return response()->json('Post Deleted',200);
        //i could use 204 as well but i like to show nice lil' messages
    }
}
