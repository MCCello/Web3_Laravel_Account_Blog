@extends('layouts.footer')
@extends('layouts.app')

@section('content')

<div style="text-align:center;color:white"><br>
<svg class="bi bi-person-square" width="4em" height="4em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
</svg> <p>Profile</p>
</div>

<section id="styles" class="s-styles">
    
    <div class="row narrow section-intro add-bottom text-center">
  
        <div class="col-twelve tab-full">
  
            <h3>Change profile Picture:</h3>
            
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

               <p> Select new Picture:</p>
               <img style="width: 48%" src="{{asset('/images/avatars/'.Auth::user()->avatar)}}"><br> 
   
            </div>

            <div class="card-body">
               <form action="/upload" method="post" enctype="multipart/form-data">
               @csrf
                <input type="file" style="border-radius:10px;padding:17px;border: 1px solid black" name="image" />
                <input type="submit" class="btn btn--primary" value="Upload" />
               </form>
            </div>
        </div>


            <hr><h3> Change Password</h3>

    <div class="col-twelve tab-full">
        <form method="POST" action="{{ route('change.password') }}">
        @csrf

        @foreach ($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
        @endforeach 

            <div class="card-body">
                <label style="margin-right:5.5em;margin-top:30px" for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                <input  id="password" type="password" name="current_password" autocomplete="current-password">
            </div>

            <div class="card-body">
                <label style="margin-right:7em;margin-top:30px" for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                <input id="new_password" type="password" name="new_password" autocomplete="current-password">
            </div>


            <div class="card-body">
                <label style="margin-right:2em;margin-top:30px" for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                <input id="new_confirm_password" type="password" name="new_confirm_password" autocomplete="current-password">
            </div>

            <button class="btn btn--primary" type="submit">Update Password</button>

        
        </form>
    </div>

    
  
</section>


@endsection


