@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row ">
            @include('front.categories')
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Cart</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($products as $product)
                                <div class="product-info" style="border-bottom: 0.5px solid lightgrey">
                                    <a href="{{ route('front-show-product', $product) }}">
                                        <p><b>Title:</b> {{ $product->product_title }}</p>
                                    </a>
                                    {{-- <p><b>Description:</b> {{ $product->product_description }}</p>
                                    <p><b>How to use:</b> {{ $product->product_how_to_use }}</p>
                                    <p><b>Warnings:</b> {{ $product->product_warnings }}</p>
                                    <p><b>Ingredients:</b> {{ $product->product_ingredients }}</p>
                                    <p><b>Category Type:</b> {{ $product->category->category_type }} --}}
                                    {{-- <p><b>Price:</b> {{ $product->product_price }} eur</p> --}}
                                    <div class="buy">
                                        <span>{{ $product->product_price }} eur</span>
                                        <form action="{{ route('cart-remove') }}" method="post">
                                            <input type="hidden" name="id" value={{ $product->id }}>
                                            <button type="submit" class="btn btn-danger">remove</button>
                                            @method('put')
                                            @csrf
                                        </form>
                                        <form action="{{ route('cart-update') }}" method="post">
                                            <input type="hidden" name="id" value={{ $product->id }}>
                                            <button type="submit" name="update" class="btn btn-info">update</button>
                                            <input type="number" value="{{ $product->count }}" min="1"
                                                name="count">
                                            @method('put')
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <li class="list-group-item">
                                    <div>Cart is empty</div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="cart-bottom">
                        <div class="total">
                            <h3>total: {{$total}}</h3>
                        </div>
                        <div class="buy-now">
                            @guest
                            <h3>Please login to buy</h3>
                            @guest
                            @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                            @endguest
                            @else
                            <form action="{{ route('cart-buy') }}" method="post">
                                <button type="submit" class="btn btn-success">Buy now</button>
                                @csrf
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
