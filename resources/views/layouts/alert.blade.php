@if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div> 
@endif

@if(session('eror'))
        <div class="alert alert-danger">
            {{session('eror')}}
        </div> 
@endif