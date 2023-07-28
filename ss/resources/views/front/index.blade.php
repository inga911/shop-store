@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row ">
            @include('front.categories')
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Products List</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                           <div>No products</div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
