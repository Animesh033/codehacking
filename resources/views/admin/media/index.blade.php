@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    @if(Session::has('deleted_media'))
        <p class="bg-danger">{{ session('deleted_media') }}</p>
    @endif
    @if(isset($photos) && $photos)
        <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td><a href="{{ route('media.edit', $photo->id) }}"><img height="60" class="img-rounded" src="{{ $photo->file ? $photo->file : 'https://via.placeholder.com/100' }}" alt=""></a></td>
                        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'No date available' }}</td>
                        <td>{{ $photo->created_at ? $photo->updated_at->diffForHumans() : 'No date available' }}</td>
                        <td>
                            <form method="POST" action="{{ route('media.destroy', $photo->id) }}">
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
                {{ $photos->render() }}
            </div>
        </div>
    @endif
@endsection