@if(Session::has('comment_message'))
    <div class="alert alert-success col-sm-6">
        <p class="text-center"><b>{{ session('comment_message') }}</b></p>
    </div>
    
@endif