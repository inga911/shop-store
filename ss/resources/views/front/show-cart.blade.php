@extends('layouts.front')

@section('content')
    <div class="container front-container">
        <div class="row ">
            @include('front.categories')
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="cat-card-title">Cart</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($products as $product)
                                <div class="cart-product-info">
                                    <div class="cart-img">
                                        @if ($product->photo)
                                            <a href="{{ route('front-show-product', $product) }}" class="cat-links">
                                                <img src="{{ asset('/products-img') . '/' . $product->photo }}"
                                                    alt="product photo">
                                            </a>
                                        @else
                                            <a href="{{ route('front-show-product', $product) }}" class="cat-links">
                                                <img src="{{ asset('/products-img') . '/no-photo.png' }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="prod-main-info">
                                        <a href="{{ route('front-show-product', $product) }}">
                                            <h5 class="title">{{ $product->product_title }}</h5>
                                        </a>
                                        <form action="{{ route('cart-remove') }}" method="post">
                                            <input type="hidden" name="id" value={{ $product->id }}>
                                            <button type="submit" class="btn-rem-cart">
                                                <img src="{{ asset('/products-img') . '/recycle-bin.png' }}" alt="recycle" 
                                                class="rem-cart">
                                            </button>
                                            @method('put')
                                            @csrf
                                        </form>
                                        @php
                                            $oneProductTotal = $product->product_price * $product->count;
                                        @endphp
                                    </div>
                                    <div class="buy">
                                        <span>{{ $product->product_price }} &#8364;</span>
                                        <form action="{{ route('cart-update') }}" method="post">
                                            <input type="hidden" name="id" value={{ $product->id }}>
                                            <span>x</span>
                                            <input type="number" value="{{ $product->count }}" min="1"
                                                name="count" class="count-input">
                                            <span> = {{ $oneProductTotal }} &#8364;</span>
                                            <button type="submit" name="update" class="btn-update">&#10227;</button>
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
                            <h3 class="cat-card-title">Total: {{ $total }} &#8364;</h3>
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
                                    <button type="submit" class="btn-buy-now">
                                       Buy now
                                    </button>
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
