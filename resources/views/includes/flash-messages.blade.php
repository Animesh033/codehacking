<!-- Post Flash messages -->
@if(Session::has('comment_message'))
    <div class="alert alert-success col-sm-4">
        <p class="text-center"><b>{{ session('comment_message') }}</b></p>
    </div>
    
@endif
<!-- Reply Flash messages -->
@if(Session::has('reply_message'))
    <div class="alert alert-success col-sm-4">
        <p class="text-center"><b>{{ session('reply_message') }}</b></p>
    </div>
    
@endif
@if(Session::has('deleted_media'))
    <div class="alert alert-danger col-sm-4">
        <p class="text-center"><b>{{ session('deleted_media') }}</b></p>
    </div>
    
@endif
<!-- Post Flash messages -->
@if(Session::has('created_post'))
    <div class="alert alert-success col-sm-4">
        <p class="text-center"><b>{{ session('created_post') }}</b></p>
    </div>
@endif
@if(Session::has('updated_post'))
    <div class="alert alert-success col-sm-4">
        <p class="text-center"><b>{{ session('updated_post') }}</b></p>
    </div>
@endif
@if(Session::has('deleted_post'))
    <div class="alert alert-danger col-sm-4">
        <p class="text-center"><b>{{ session('deleted_post') }}</b></p>
    </div>
@endif

<!-- Category Flash messages -->
@if(Session::has('created_category'))
    <div class="alert alert-success col-sm-4">
        <p class="text-center"><b>{{ session('created_category') }}</b></p>
    </div>
@endif
@if(Session::has('updated_category'))
    <div class="alert alert-success col-sm-4">
        <p class="text-center"><b>{{ session('updated_category') }}</b></p>
    </div>
@endif
@if(Session::has('deleted_category'))
    <div class="alert alert-danger col-sm-4">
        <p class="text-center"><b>{{ session('deleted_category') }}</b></p>
    </div>
@endif

<!-- User Flash messages -->
@if(Session::has('created_user'))
    <div class="alert alert-success col-sm-4">
        <p class="text-center"><b>{{ session('created_user') }}</b></p>
    </div>
@endif

@if(Session::has('deleted_user'))
    <div class="alert alert-danger col-sm-4">
        <p class="text-center"><b>{{ session('deleted_user') }}</b></p>
    </div>
@endif

@if(Session::has('updated_user'))
    <div class="alert alert-success col-sm-4">
        <p class="text-center"><b>{{ session('updated_user') }}</b></p>
    </div>
@endif