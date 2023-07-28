@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Edit product: <b><i>{{ $product->product_title }} ({{ $product->category->category_type }})</i></b></h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products-update', $product) }}" method="post">
                            <div class="mb-3">
                                <label class="form-label">Product title</label>
                                <input type="text" class="form-control" name="product_title"
                                    value="{{ old('product_title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product description</label>
                                <input type="text" class="form-control" name="product_description"
                                    value="{{ old('product_description') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">How to use product</label>
                                <input type="text" class="form-control" name="product_how_to_use"
                                    value="{{ old('product_how_to_use') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warnings</label>
                                <input type="text" class="form-control" name="product_warnings"
                                    value="{{ old('product_warnings') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingredients</label>
                                <input type="text" class="form-control" name="product_ingredients"
                                    value="{{ old('product_ingredients') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="product_price"
                                    value="{{ old('product_price') }}">
                            </div>
                            <div class="col-4">
                                <label class="form-label">Product Category</label>
                                <select class="form-select" name="category_id">
                                    <option value="0">Categories list</option>
                                    @foreach ($cats as $cat)
                                        @if ($cat->id === old('category_id', $product->category_id))
                                            <option value="{{ $cat->id }}" selected>{{ $cat->category_type }}</option>
                                        @else
                                            <option value="{{ $cat->id }}">{{ $cat->category_type }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-text">Please select product category here</div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Add to list</button>
                            @method('put')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
