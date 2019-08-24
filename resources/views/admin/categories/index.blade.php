@extends('layouts.admin')
@section('content')
    @if(Session::has('deleted_category'))
        <p class="bg-danger">{{ session('deleted_category') }}</p>
    @endif
    <h1>Category</h1>
    @include('includes.errors')
    <div class="col-sm-6">
        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
    <div class="col-sm-6">
        <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($categories) && $categories)
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->created_at ? $category->created_at->diffForHumans() : 'No date available' }}</td>
                        <td>{{ $category->updated_at ? $category->updated_at->diffForHumans() : 'No date available' }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{ $categories->render() }}
            </div>
        </div>
    </div>
@endsection