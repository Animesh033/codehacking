@extends('layouts.admin')
@section('content')
    <h1>Edit Category</h1>
    @include('includes.errors')
    <div class="col-sm-6">
        <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Enter name">
            </div>
            <button type="submit" class="btn btn-primary pull-left">Update Category</button>
        </form>
        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="form-group">
                <button type="submit" class="btn btn-danger pull-right">Delete Category</button>
            </div>
        </form>
    </div>
@endsection