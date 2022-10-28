<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\ImageManagerStatic as Image;




class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function uploadAvatar(Request $request)
    {
      if($request->hasFile('image'))
      {
         User::uploadAvatar($request->image);
         return redirect()->back()->with('success','Image Succesfully Uploaded');
      }
      else
      {
         return redirect()->back()->with('error','Please select an Image.');
      }
     
    }
    public function getName($id)
    {
      $user = User::find($id);
      return $user->name;
    }

  
  
    public function index()
    { 
      //  INSERT-------------------
       //DB::insert('insert into users (name,email,password) 
         //values (?,?,?)', ['mihail', 'mihail@gmail.com', 'password',]);
    
     
      //  DELETE -------------------
      // DB::delete('delete from users where id=1');

      //  UPDATE----------------------
      //DB::update('update users set name = ? where id=1',
      //['leeepa']);

      //  DISPLAY-------------------
      //$users = DB::select('select * from users');
      //return $users; 



      //  CREATE--------------------
      // $user=new User();
      // $user->name = 'Lmeow';
      // $user->email = 'lmeaow@gmail.com';
      // $user->password = bcrypt('password');
      // $user->save();
      
      //--------------------------------------------------------

      //  CREATE -------------------
      // $data = [
      //   'name'   => 'Cool',
      //   'email'  => 'cooly@gmail.com',
      //   'password' => 'password',
      // ];
      // User::create($data);

      //  DELETE---------------------
      //User::where('id',4)->delete();

      //  UPDATE---------------------
      //User::where('id',5)->update(['name'=>'prrrrraaa']);

      //  DISPLAY--------------------
      $user = User::all();
      return $user;


      return view('home');

    }
}