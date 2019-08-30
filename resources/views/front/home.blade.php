@extends('layouts.blog-home')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            {{-- <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1> --}}

            <!-- First Blog Post -->
            @if(isset($posts) && count($posts)>0)
                @foreach ($posts as $post)
                    <h2>
                        <a href="{{ route('home.post', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="lead">
                        by {{ $post->user->name }}
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span>{{ $post->created_at->diffForHumans() }}</p>
                    <hr>
                    <img class="img-responsive img-rounded" style="max-height:200px; max-width:100%;" src="{{ $post->photo ? $post->photo->file == '/images/avatar.png' ? $post->photoPlaceholder() : $post->photo->file : $post->photoPlaceholder() }}" alt="">
                    <hr>
                    <p>{!! str_limit($post->body, 200) !!}</p>
                    <a class="btn btn-primary" href="{{ route('home.post', $post->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        
                    <hr>
                @endforeach

            @endif

            <!-- Pager -->
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    {{ $posts->links() }}
                </div>
            </div>
            {{-- <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul> --}}

        </div>

        <!-- Blog Sidebar -->
        @include('includes.front-sidebar')

    </div>
    <!-- /.row -->
@endsection
