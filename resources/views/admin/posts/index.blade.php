@extends('layouts.admin')
@section('content')
    <h1>Posts</h1>
    <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($posts) && $posts)
                @foreach ($posts as $post)
                  <tr>
                      <td>{{ $post->id }}</td>
                      <td><img height="60" class="img-rounded" src="{{ $post->photo ? $post->photo->file : 'https://via.placeholder.com/100' }}" alt=""></td>
                      <td>{{ $post->user ? $post->user->name : 'Post has no Owner' }}</td>
                      <td>{{ $post->category_id }}</td>
                      <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                      <td>{{ $post->body }}</td>
                      <td>{{ $post->created_at->diffForHumans() }}</td>
                      <td>{{ $post->updated_at->diffForHumans() }}</td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
@endsection