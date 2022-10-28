@extends('layouts.footer')
@extends('layouts.app')
@php
    use App\User;
    use App\Comment;
@endphp

@section('content')
<section class="s-styles">
<div class="row add-bottom">

    <div class="col-twelve">
            <h2>Users</h2>
            <div style="display:flex;justify-content:center">
                <div>
                <a style="float:center" onclick="return confirm('Downlowad the Document?')" href='/export_excel/excel' class="btn btn-lg btn--primary">Export to Excel</a>
                </div>
                </div>

        <div class="table-responsive">

            <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                      
 @foreach($user_data as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td> {{$user->name}}</td>
                        <td>{{$user->email}} </td>
                        <td> {{$user->created_at}}</td>
                    </tr> 
@endforeach
                
                    </tbody>
            </table>
        </div>

    </div>
 
</div> <!-- end row -->
</section>

@endsection