@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>
    @include('includes.errors')
    <div class="col-sm-3">
        <img src="{{ $user->photo ? $user->photo->file : Auth::user()->gravatar }}" alt="Photo" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role_id">
                    <option value="" selected>Select Role</option>
                    @if(isset($roles) && $roles)
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="is_active">
                    <option value="" selected>Select Status</option>
                    <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }} >Active</option>
                    <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }} >Not Active</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Choose file</label>
                <input type="file" class="form-control" id="photo" name="photo_id">
                
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary pull-left">Update User</button>
        </form>
        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="form-group">
                <button type="submit" class="btn btn-danger pull-right">Delete User</button>
            </div>
        </form>
    </div>
@endsection