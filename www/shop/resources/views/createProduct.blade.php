@extends('layouts.app')

@section('title', 'Product')

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

    <h1 class="mb-2">Create new product</h1>

    <form action="/admin/product/create" method="post">
        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="sku" class="form-control" id="sku" name="sku">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="description" class="form-control" id="description" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection