@extends('layouts.admin')
@section('content')
    <h1>Create Posts</h1>
    @include('includes.tinyeditor')
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="category" name="category_id">
                <option value="" selected>Select category</option>
                @if(isset($categories) && $categories)
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                    @endforeach
                @else
                <option value="0">No categories found</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control" id="photo" name="photo_id">
            
        </div>
        <div class="form-group">
            <label for="body">Description:</label>
            <textarea rows="3" class="form-control" name="body" id="body" placeholder="Description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
@endsection