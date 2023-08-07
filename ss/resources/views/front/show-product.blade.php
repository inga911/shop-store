@extends('layouts.front')

@section('content')
    <div class="container show-product">
        <div class="row ">
            <div class="col-12 prod-col">
                <div class="card-body">
                    <div class="product-img">
                        @if ($product->photo)
                            <img src="{{ asset('/products-img') . '/' . $product->photo }}" alt="product photo"
                                class="main-photo">
                            @if ($product->gallery->count() > 0)
                                <div class="gallery">
                                    @foreach ($product->gallery as $photo)
                                        <img src="{{ asset('products-img') . '/' . $photo->product_photos }}"
                                            class="gallery-img">
                                    @endforeach
                                </div>
                            @else
                                <p>Product does not have gallery photos.</p>
                            @endif
                        @else
                            <img src="{{ asset('/products-img') . '/no-photo.png' }}" class="main-photo">
                        @endif

                    </div>
                    <div class="product-info">
                        <p class="prod-title"><b> {{ $product->product_title }}</b></p>
                        @include('front.vote')
                        <p class="prod-description"><b>Description:</b> {{ $product->product_description }}</p>
                        <div class="buy">
                            <span>{{ $product->product_price }} &#8364;</span>
                            <section class="add-to-cart --add--to--cart" data-url="{{ route('cart-add') }}">
                                <input type="hidden" name="id" value={{ $product->id }}>
                                <input type="number" value="1" min="1" name="count" class="number-input">
                                <button type="button" class="btn-add-cart">&#128722;</button>
                            </section>
                        </div>

                    </div>
                </div>
                <div class="about-product">
                    <button>How to use</button>
                    <button>Warnings</button>
                    <button>Ingredients</button>
                    <button>Info</button>
                    <p><b>How to use:</b> {{ $product->product_how_to_use }}</p>
                    <p><b>Warnings:</b> {{ $product->product_warnings }}</p>
                    <p><b>Ingredients:</b> {{ $product->product_ingredients }}</p>
                    <p><b>Category Type:</b> {{ $product->category->category_type }}
                </div>
            </div>
        </div>
    </div>
@endsection
