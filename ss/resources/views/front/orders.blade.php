@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row ">
            @include('front.categories')
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>My Orders</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($orders as $order)
                                    <div>
                                       <b> Order status: {{$status[$order->status]}} </b>
                                    </div>
                                    @if($order->status == 2)
                                        <a href="{{route('front-download', $order)}}">Download</a>
                                    @endif
                                    <div>
                                        <b>Order ID:{{$order->id}}</b>
                                    </div>
                                    
                                    <div>
                                        @foreach ($order->products as $product)
                                        <li>
                                            <div>{{$product['title']}}</div>
                                            <div>{{$product['price']}} eur
                                            x
                                            {{$product['count']}}</div>
                                            <b>Total:  {{$product['total']}}</b>
                                        </li>
                                        @endforeach
                                    </div>
                            @empty
                                <div class="list-group-item">
                                    <h4>No orders yet</h4>
                                </div>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
