@extends('layouts.app_one_col')

@section('title', 'Catalog')

@section('sidebar')
    @parent
@endsection

@section('content')
    @isset($products)
        <h1 class="mb-3">Our products</h1>

        @foreach ($products as $product)
            <div class="card mt-2">
                <div class="card-header">
                    {{ $product->sku }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="#" class="btn btn-primary">BUY</a>
                </div>
            </div>
        @endforeach
    @endisset
@endsection