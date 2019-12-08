@extends('layouts.app_one_col')

@section('title', 'Login')

@section('content')

    @isset($error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endisset
    <form action="/login" method="post">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection