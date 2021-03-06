@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Manage Users</h1>
            </div>
        </div>
        <div class="d-flex mt-5">
            <a href="/admin/users/create" class="btn btn-lg btn-primary">Create User</a>
            <form method="GET" role="search" class="w-100 ml-3">
                <input type="search" class="form-control form-control-lg" name="q" placeholder="Search for users" value="{{ old('q') }}">
            </form>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="list-group">
                    @foreach($users as $user)
                        <div class="list-group-item d-flex">
                            <div class="mr-auto">
                                <h4>{{ $user->name }}</h4>
                                <h5 class="text-muted">{{ $user->email }}</h5>
                                <small class="text-muted">Member since {{ $user->created_at->toFormattedDateString() }}</small>
                            </div>
                            <div class="ml-auto mr-0 row align-items-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" role="button" data-toggle="dropdown">Manage</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="/admin/users/{{ $user->id }}/edit">Edit</a>
                                        <form action="/admin/users/{{ $user->id }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $users->appends(['q'])->render() }}
            </div>
        </div>
    </div>
    @endsection