@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row ">
            @include('front.categories')
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>{{ $product->product_title }}</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                                <div style="border-bottom: 0.5px solid lightgrey">
                                    <p><b>Title:</b> {{ $product->product_title }}</p>
                                    <p><b>Description:</b> {{ $product->product_description }}</p>
                                    <p><b>How to use:</b> {{ $product->product_how_to_use }}</p>
                                    <p><b>Warnings:</b> {{ $product->product_warnings }}</p>
                                    <p><b>Ingredients:</b> {{ $product->product_ingredients }}</p>
                                    <p><b>Category Type:</b> {{ $product->category->category_type }}
                                    <p><b>Price:</b> {{ $product->product_price }} eur</p>
                                    <div class="buy">
                                        <span>{{$product->product_price}} eur</span>
                                        <section class="--add--to--cart" data-url="{{route('cart-add')}}">
                                            <button type="button" class="btn btn-primary">add to cart</button>
                                            <input type="hidden" name="id" value={{$product->id}}>
                                            <input type="number" value="1" min="1" name="count">
                                        </section>
                                    </div>
                                </div>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
