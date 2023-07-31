@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Orders</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($orders as $order)
                                <div>
                                    <b>Order ID:{{ $order->id }}</b>
                                </div>
                                <div>
                                    <b> Order belongs to: {{ $order->user->name }} </b>
                                </div>
                                <div>
                                    <form action="{{route('orders-update', $order)}}" method="post">
                                        <button type="submit" name=status value="1" class="btn btn-warning">Proccesing</button>
                                        <button type="submit" name=status value="2" class="btn btn-warning">Confirmed</button>
                                        @csrf
                                        @method('put')
                                    </form>
                                    <b> Order status: {{ $status[$order->status] }} </b>
                                </div>

                                <div>
                                    @foreach ($order->products as $product)
                                        <li>
                                            <div>{{ $product['title'] }}</div>
                                            <div>{{ $product['price'] }} eur
                                                x
                                                {{ $product['count'] }}</div>
                                            <b>Total: {{ $product['total'] }}</b>
                                        </li>
                                    @endforeach
                                </div>
                            @empty
                                <div class="list-group-item">
                                    <h4>No orders</h4>
                                </div>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
