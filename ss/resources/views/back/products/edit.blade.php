@extends('layouts.app')

@section('content')
    <div class="container product-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="card-title">Edit product: <b>{{ $product->product_title }}
                                ({{ $product->category->category_type }})</b></h1>
                    </div>
                    <div class="card-body products-inputs">
                        <form action="{{ route('products-update', $product) }}" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Product title</label>
                                <input type="text" class="form-control" name="product_title"
                                    value="{{ old('product_title', $product->product_title) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product description</label>
                                <textarea type="text" rows="5" cols="40" class="form-control" name="product_description">{{ old('product_description', $product->product_description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">How to use product</label>
                                <textarea type="text" rows="5" cols="40" class="form-control" name="product_how_to_use">{{ old('product_how_to_use', $product->product_how_to_use) }} </textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warnings</label>
                                <textarea type="text" rows="5" cols="40" class="form-control" name="product_warnings"> {{ old('product_warnings', $product->product_warnings) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingredients</label>
                                <textarea type="text" rows="5" cols="40" class="form-control" name="product_ingredients">{{ old('product_ingredients', $product->product_ingredients) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control price-input" name="product_price"
                                    value="{{ old('product_price', $product->product_price) }}">
                            </div>
                            <div class="cat-selection">
                                <label class="form-label">Choose category</label>
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
                            </div>
                            <div class="form-text">Please select product category here</div>
                            <h4 class="card-title">Product photo:</h4>
                            <div class="product-photo">
                                <div class="mb-3 photo-col">
                                    @if ($product->photo)
                                        <img src="{{ asset('/products-img') . '/' . $product->photo }}"
                                            alt="product photo">
                                    @else
                                        <img src="{{ asset('/products-img') . '/no-photo.png' }}">
                                    @endif
                                    <div class="product-main-photo">
                                        <label class="form-label photo-label">Upload Main Product photo</label>
                                        <input type="file" class="form-control" name="photo">
                                        <button type="submit" name="delete" value="1"
                                            class="btn btn-outline-danger">Delete main photo</button>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3 gallery-col" data-gallery="0">
                                <label class="form-label gallery-label"> <span class="rem">X</span> Gallery photo</label>
                                <input type="file" class="form-control">
                            </div>
                            <div class="gallery-inputs">

                            </div>

                            <button type="button" class="btn-add-gallery --add--gallery">Add photo to gallery</button>

                            <button type="submit" class="btn-edit-product">Edit</button>
                            @method('put')
                            @csrf
                        </form>
                    </div>
                    <ul class="gallery-list">
                        @foreach ($product->gallery as $photo)
                            <li class="list-group-item">
                                <form action="{{ route('products-delete-photo', $photo) }}" method="post">
                                    <div class="gallery">
                                        @if ($photo->product_photos)
                                            <img src="{{ asset('products-img') . '/' . $photo->product_photos }}">
                                            <button type="submit" class="m-5 btn btn-danger">Delete photo</button>
                                        @else
                                            <p>Product doe not have gallery</p>
                                        @endif
                                    </div>
                                    @csrf
                                    @method('delete')
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
