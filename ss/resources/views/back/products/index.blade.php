@extends('layouts.app')

@section('content')
    <div class="container product-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="card-title">Products List</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($products as $product)
                                <li class="list-group-item">
                                    <div class="product">
                                        <div class="product-info">
                                            <p><b>Title:</b> {{ $product->product_title }}</p>
                                            <p><b>Category Type:</b> {{ $product->category->category_type }}</p>
                                            <p><b>Description:</b> {{ $product->product_description }}</p>
                                            <p><b>How to use:</b> {{ $product->product_how_to_use }}</p>
                                            <p><b>Warnings:</b> {{ $product->product_warnings }}</p>
                                            <p><b>Ingredients:</b> {{ $product->product_ingredients }}</p>
                                            <p><b>Price:</b> {{ $product->product_price }}</p>
                                        </div>
                                        <div class="product-photo">
                                            @if ($product->photo)
                                                <img src="{{ asset('/products-img') . '/' . $product->photo }}"
                                                    alt="product photo">
                                            @else
                                                <img src="{{ asset('/products-img') . '/no-photo.png' }}">
                                            @endif
                                        </div>
                                        <div class="buttons">
                                            <a href="{{ route('products-edit', $product) }}"
                                                class="btn-edit">Edit</a>
                                            <form action="{{ route('products-delete', $product) }}" method="post">
                                                <button type="submit" class="btn-delete">Delete</button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
