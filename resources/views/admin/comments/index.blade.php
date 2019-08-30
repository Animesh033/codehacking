@extends('layouts.admin')
@section('content')
@if(isset($comments) && count($comments) > 0)
    <h1>Comments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Author</th>
                <th>Email</th>
                <th>Comment</th>
                {{-- <th>Created</th> --}}
                {{-- <th>Updated</th> --}}
                <th>View Post</th>
                <th>View Reply</th>
                <th>Approve/Un-approve</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td><img height="60" class="img-rounded" src="{{ $comment->photo ? $comment->photo : Auth::user()->gravatar }}" alt=""></td>
                    <td><a href="{{ route('comments.edit', $comment->id) }}">{{ $comment->author ? $comment->author : 'comment has no author' }}</a></td>
                    <td>{{ $comment->email ? $comment->email : 'No email' }}</td>
                    <td>{{ str_limit($comment->body, 10) }}</td>
                    {{-- <td>{{ $comment->created_at->diffForHumans() }}</td> --}}
                    {{-- <td>{{ $comment->updated_at->diffForHumans() }}</td> --}}
                    <td><a href="{{ route('home.post', $comment->post->slug) }}">View Post</a></td>
                    <td><a href="{{ route('replies.show', $comment->id) }}">View Reply</a></td>
                    <td>
                        @if($comment->is_active == 1)
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" name="is_active" value="0">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Un-approve</button>
                            </div>
                        </form>
                        @else
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" name="is_active" value="1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Approve</button>
                            </div>
                        </form>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{ $comments->render() }}
        </div>
    </div>
@else
    <h1 class="text-center">No Comments</h1>
@endif
@endsection