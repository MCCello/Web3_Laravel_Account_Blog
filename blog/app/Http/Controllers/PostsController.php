<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use PDF;



class PostsController extends Controller
{

       /**
     * Create a new controller instance.
     * Does not allow unauthorised web surfing
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    //show posts (news feed)
    public function index()
    {
        $posts= Post::orderBy('created_at','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    //display speciific post by id
    public function show($id)
    {
        $post = Post::find($id);
        $comments=Comment::orderBy('created_at','desc')->get();
        return view('posts.show')->with('post',$post)->with('comments',$comments);
    }

    //redirects to create page
    public function create()
    {
        return view('posts.create');
    }

    //storing of data from form to a new post
    public function store (Request $request)
    {
        $this->validate($request,['title' => 'required','body' => 'required','cover_image'=>'image|required|max:2999']);
        //handle upload file also if image with same name already exists
        $filenametxt = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filenametxt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $filenamestored = $filename .'_'.time().'.'.$extension;
        //upload image
        $path = $request->file('cover_image')->storeAs('public/images/cover',$filenamestored); 
    
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = Auth::user()->id;
        
        

        $img = Image::make( $request->file('cover_image')->getRealPath());
        $img->insert('images/watermark.png');
        $img->save('images/cover/wk'.$filenamestored);
    
        $post->cover_image = 'wk'.$filenamestored;
        $post->save();

        return redirect('/posts')->with('success' ,'Post Added Succesfully');


    }

    //redirects to page that edits specific post 
    public function edit($id)
    {
        $post = Post::find($id);
        //unauthorized attempt of editing not owned post
        if(Auth::user()->id != $post->author)
        {
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
    }


    //actual editing
    public function update(Request $request, $id)
    {   $post = Post::find($id);
        
        if($request->hasFile('cover_image'))
        {
         $this->validate($request,['title' => 'required','body' => 'required','cover_image'=>'image|max:2999']);
        //handle upload file also if image with same name already exists
        $filenametxt = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filenametxt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $filenamestored = $filename .'_'.time().'.'.$extension;
        //upload image
        $path = $request->file('cover_image')->storeAs('public/images/cover',$filenamestored); 
        
        $post->cover_image = 'wk'.$filenamestored; 
        $img = Image::make( $request->file('cover_image')->getRealPath());
        $img->insert('images/watermark.png');
        $img->save('images/cover/wk'.$filenamestored);
        }
       
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success' ,'Post Added Succesfully');



    }

    public function destroy($id)
    {
        $post = Post::find($id);   
        Storage::delete('/public/covers/'.$post->cover_image);
        $post->delete();
     
        return redirect ('/posts')->with('success','Post successfully deleted');

    }
    //personal posts by user
    public function myposts()
        {
            $id = Auth::user()->id;
            $myposts= DB::table('posts')
                    ->having('author','=',$id)
                    ->get();
            return view('/myposts')->with('posts', $myposts);
        }
    

    public function popular()
    {
        $posts= Post::orderBy('created_at','desc')->get();
        return $posts;
    }

    public function downloadPDF($id)
    {
        $post=Post::find($id);  
        $pdf = PDF::loadView('posts.pdf',compact('post'));
        return $pdf->download('post.pdf');
    }



}
