@extends('layouts.front')

@section('content')
    <div class="container front-container">
        <div class="row ">
            @include('front.categories')
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="cat-card-title">My Orders</h1>
                    </div>
                    <div class="card-body orders-body">
                        @forelse($orders as $order)
                            <div class="card">
                                <h4 class="order-data">
                                    <p>Order nummer: {{ $order->id }}</p>
                                    <p> Order status: {{ $status[$order->status] }}
                                        @if ($order->status == 2)
                                            <a href="{{ route('front-download', $order) }}">
                                                <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 12V19M12 19L9.75 16.6667M12 19L14.25 16.6667M6.6 17.8333C4.61178 17.8333 3 16.1917 3 14.1667C3 12.498 4.09438 11.0897 5.59198 10.6457C5.65562 10.6268 5.7 10.5675 5.7 10.5C5.7 7.46243 8.11766 5 11.1 5C14.0823 5 16.5 7.46243 16.5 10.5C16.5 10.5582 16.5536 10.6014 16.6094 10.5887C16.8638 10.5306 17.1284 10.5 17.4 10.5C19.3882 10.5 21 12.1416 21 14.1667C21 16.1917 19.3882 17.8333 17.4 17.8333"
                                                        stroke="#464455" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span>(Download)</span>
                                            </a>
                                        @endif
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
                                                    <td>{{ $product['price'] }} &#8364;
                                                        x
                                                        {{ $product['count'] }}</td>
                                                    <td>{{ $product['total'] }} &#8364;</td>
                                                </tr>
                                                @php
                                                    $finalTotal += $product['total'];
                                                @endphp
                                            </tbody>
                                        @endforeach
                                    </table>
                                    <div>
                                        <h5 class="total">Total: {{ $finalTotal }} &#8364;</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item">
                                <h4>No orders yet</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
