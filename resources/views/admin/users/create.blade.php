@extends('layouts.admin')
@section('content')
    <h1>Create User</h1>
    @include('includes.errors')
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role_id">
                <option value="" selected>Select Role</option>
                @if(isset($roles) && $roles)
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="is_active">
                <option value="" selected>Select Status</option>
                <option value="1">Active</option>
                <option value="0">Not Active</option>
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
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
@endsection