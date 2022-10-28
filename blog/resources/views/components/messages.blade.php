@if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert-box alert-box--error hideit">
         {{$error}}
    </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert-box alert-box--success hideit">
    {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert-box alert-box--error hideit">
    {{session('error')}}
    </div>
@endif