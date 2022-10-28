<div>
        @if(session()->has('message'))
               <div class="alert alert-success">{{session()->get('message')}}</div>
                @elseif(session()->has('error'))
                <div class="alert-box alert-box--error hideit">{{session()->get('error')}}</div>            
         @endif  
</div>