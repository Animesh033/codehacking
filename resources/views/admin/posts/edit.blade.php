@extends('layouts.admin')
@section('content')
    <h1>Edit Posts</h1>
    @include('includes.errors')
    @include('includes.tinyeditor')
    <div class="col-sm-3">
        <img src="{{ $post->photo ? $post->photo->file : $post->photoPlaceholder() }}" alt="Photo" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category_id">
                    <option value="" selected>Select Category:</option>
                    @if(isset($categories) && $categories)
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ ucfirst($category->name) }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control" id="photo" name="photo_id">
                
            </div>
            <div class="form-group">
                <label for="body">Description:</label>
                <textarea rows="3" class="form-control" name="body" id="body" placeholder="Description">{{ $post->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary pull-left">Update Post</button>
        </form>
        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="form-group">
                <button type="submit" class="btn btn-danger pull-right">Delete Post</button>
            </div>
        </form>
    </div>
@endsection