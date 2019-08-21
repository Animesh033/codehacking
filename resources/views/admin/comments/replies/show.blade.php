@extends('layouts.admin')
@section('content')
@if(isset($replies) && count($replies) > 0)
    <h1>Replies</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Author</th>
                <th>Email</th>
                <th>Reply</th>
                {{-- <th>Created</th> --}}
                {{-- <th>Updated</th> --}}
                <th>View</th>
                <th>Approve/Un-approve</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($replies as $reply)
                <tr>
                    <td>{{ $reply->id }}</td>
                    <td><img height="60" class="img-rounded" src="{{ $reply->photo ? $reply->photo : 'https://via.placeholder.com/100' }}" alt=""></td>
                    <td><a href="{{ route('replies.edit', $reply->id) }}">{{ $reply->author ? $reply->author : 'reply has no author' }}</a></td>
                    <td>{{ $reply->email ? $reply->email : 'No email' }}</td>
                    <td>{{ str_limit($reply->body, 10) }}</td>
                    {{-- <td>{{ $reply->created_at->diffForHumans() }}</td> --}}
                    {{-- <td>{{ $reply->updated_at->diffForHumans() }}</td> --}}
                    <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View Post</a></td>
                    <td>
                        @if($reply->is_active == 1)
                        <form method="POST" action="{{ route('replies.update', $reply->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" name="is_active" value="0">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Un-approve</button>
                            </div>
                        </form>
                        @else
                        <form method="POST" action="{{ route('replies.update', $reply->id) }}">
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
                        <form method="POST" action="{{ route('replies.destroy', $reply->id) }}">
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
@else
    <h1 class="text-center">No replies</h1>
@endif
@endsection