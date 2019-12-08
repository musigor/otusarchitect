@extends('layouts.app')

@section('title', 'User')

@section('sidebar')
    @parent
@endsection

@section('content')

    @isset($error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}

            @isset($errors)
                @foreach ($errors as $errorMsg)
                    <li>{{ $errorMsg[0] }}</li>
                @endforeach
            @endisset

        </div>
    @endisset

    @isset($success)
        <div class="alert alert-success" role="alert">
            {{ $success }}
        </div>
    @endisset

    <h1 class="mb-2">Create new admin user</h1>

    <form action="/admin/user/create" method="post">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="firstname">First name</label>
            <input type="firstname" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last name</label>
            <input type="lastname" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection