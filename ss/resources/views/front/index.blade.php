@extends('layouts.front')

@section('content')
    <div class="container front-container">
        <div class="row ">
            @include('front.categories')
            <div class="col-9">
                @forelse($products as $product)
                    <div class="product-info">
                        <div class="card">
                            <div class="card-items">
                                <div class="product-photo">
                                    @if ($product->photo)
                                    <a href="{{ route('front-show-product', $product) }}" class="cat-links">
                                    <img src="{{ asset('/products-img') . '/' . $product->photo }}" alt="product photo">
                                    </a>
                                    @else
                                    <a href="{{ route('front-show-product', $product) }}" class="cat-links">
                                        <img src="{{ asset('/products-img') . '/no-photo.png' }}">
                                    </a>
                                    @endif
                                </div>
                                <div class="vote">
                                    <a href="{{ route('front-show-product', $product) }}" class="cat-links">
                                        <p>{{ $product->product_title }}</p>
                                    </a>
                                    @include('front.vote')
                                </div>
                            </div>
                            <div class="buy">
                                <span>{{ $product->product_price }} &#8364;</span>
                                <section class="add-to-cart --add--to--cart" data-url="{{ route('cart-add') }}">
                                    <input type="hidden" name="id" value={{ $product->id }}>
                                    <input type="number" value="1" min="1" name="count"
                                        class="number-input">
                                    <button type="button" class="btn-add-cart">&#128722;</button>
                                </section>
                            </div>
                        </div>
                    </div>
                @empty
                    <li class="list-group-item">
                        <div>No products</div>
                    </li>
                @endforelse
            </div>
        </div>
    </div>
@endsection
