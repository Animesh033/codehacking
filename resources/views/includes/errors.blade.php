@if(count($errors)>0)
    <div class="alert alert-danger error-flash col-sm-4" id="error-flash">
        <ul class="error-flash-ul">
            @foreach ($errors->all() as $error)
                <li><b>{{ $error }}</b></li>
            @endforeach
        </ul>
    </div>
@endif