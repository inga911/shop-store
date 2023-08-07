@extends('layouts.app')

@section('content')
    <div class="container orders">
        <div class="row ">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Orders</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($orders as $order)
                                <div class="card">
                                    <h4 class="order-data">
                                        <p>Order nummer: {{ $order->id }}</p>
                                        <p> Order belongs to: {{ $order->user->name }}</p>
                                        <div>
                                            <form action="{{ route('orders-update', $order) }}" method="post">
                                                <button type="submit" name=status value="1"
                                                    class="btn btn-outline-info">Proccesing</button>
                                                <button type="submit" name=status value="2"
                                                    class="btn btn-outline-warning">Confirmed</button>
                                                @csrf
                                                @method('put')
                                            </form>
                                            <b> Order status: {{ $status[$order->status] }} </b>
                                        </div>
                                        </p>
                                    </h4>


                                    <div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="table-header">
                                                    <th scope="col"></th>
                                                    <th scope="col">Product name</th>
                                                    <th scope="col">Price &#10005; count</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $finalTotal = 0;
                                            @endphp
                                            @foreach ($order->products as $product)
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <td>{{ $product['title'] }}</td>
                                                        <td>{{ $product['price'] }} &#8364; x {{ $product['count'] }}</td>
                                                        <td>{{ $product['total'] }} &#8364;</td>
                                                    </tr>
                                                    @php
                                                        $finalTotal += $product['total'];
                                                    @endphp
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div>
                                        <h3 class="total">Total: {{ $finalTotal }} eur</h3>
                                    </div>
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
