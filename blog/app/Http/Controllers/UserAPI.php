<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Http\Request;

class UserAPI extends Controller
{
    //showing all users
    public function user(){
        return response()->json(User::get(),200);
    }

    //user by id
    public function userById($id){
        $user = user::find($id);

        if($user == null){
            return response()->json('aqui no hay na pa ti',404);
            //muy cordialmente hablando, ahi no hay na' que ver
        }

        return response()->json(User::find($id),200);
    }

    //post a new user
    public function userSave(Request $request){
        $rules = ['name' => 'required | max:20'];
        //authenticator for name cause apperently emails aren't important
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->role=$request->role;
        //$user->avatar=$request->avatar;

        $v = Validator::make($request->all(),$rules);

        if ($v->fails()){
           return response()->json($v->errors(),400);
        }

        $user->save();
        return response()->json($user,201);
        
    }
    
    //if checks to update no values, one value, or all values cause that shi* annoying
    public function userUpdate(Request $request, $id){
        $user = User::find($id);
        
        if($request->input('name')==null){
            
            $user->name = $user->name;
        }else{
            $user->name = $request->input('name');
        }
    
        if($request->input('email')==null)
        {
            $user->email = $user->email;
        }else{
            $user->email = $request->input('email');
        }

        if($request->input('password')==null){
            $user->password = $user->password;
        }else{
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        return response()->json($user,200);
    }
    //deletes by ID
    public function userDelete(Request $request, $id){
        
        $user = User::find($id);
        $user->delete();

        return response()->json('User se fue',200);
        //i could use 204 as well but i like to show nice lil' messages
    }




}