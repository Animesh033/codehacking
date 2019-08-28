@extends('layouts.blog-home')
@section('content')
<div class="row">
    <div class="col-sm-8">
        
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by {{ $post->user->name }}
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{!! $post->body !!}</p>
    
    @include('includes.post-1')
    {{-- @include('includes.disqus') --}}
    </div> <!-- /.col-sm-8 -->
    @include('includes.front-sidebar')
</div>

@endsection
@include('includes.post-2')