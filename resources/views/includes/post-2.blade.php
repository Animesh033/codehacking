@section('scripts')
    <script>
        $('.comment-reply-container .toggle-reply').click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
@stop