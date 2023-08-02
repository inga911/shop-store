@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Edit product: <b><i>{{ $product->product_title }}
                                    ({{ $product->category->category_type }})</i></b></h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products-update', $product) }}" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Product title</label>
                                <input type="text" class="form-control" name="product_title"
                                    value="{{ old('product_title', $product->product_title) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product description</label>
                                <input type="text" class="form-control" name="product_description"
                                    value="{{ old('product_description', $product->product_description) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">How to use product</label>
                                <input type="text" class="form-control" name="product_how_to_use"
                                    value="{{ old('product_how_to_use', $product->product_how_to_use) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warnings</label>
                                <input type="text" class="form-control" name="product_warnings"
                                    value="{{ old('product_warnings', $product->product_warnings) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingredients</label>
                                <input type="text" class="form-control" name="product_ingredients"
                                    value="{{ old('product_ingredients', $product->product_ingredients) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="product_price"
                                    value="{{ old('product_price', $product->product_price) }}">
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
                            <div class="mb-3">
                                <div style="display: flex">
                                    <p>here is main photo</p>
                                    @if ($product->photo)
                                        <img src="{{ asset('/products-img') . '/' . $product->photo }}" alt="product photo"
                                            style="width: 200px; heigh:200px; object-fit:contain;">
                                    @else
                                        <img src="{{ asset('/products-img') . '/no-photo.png' }}"
                                            style="width: 200px; heigh:200px; object-fit:contain;">
                                    @endif
                                    <div>
                                        <label class="form-label">Upload Main Product photo</label>
                                        <input type="file" class="form-control" name="photo">
                                        <button type="submit" name="delete" value="1" class="btn btn-outline-danger">Delete main photo</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3" data-gallery="0">
                                <label class="form-label">Gallery photo <span class="rem">X</span></label>
                                <input type="file" class="form-control">
                            </div>

                            <div class="gallery-inputs">

                            </div>

                            <button type="button" class="btn btn-secondary --add--gallery">add gallery photo</button>

                            <button type="submit" class="btn btn-outline-primary">Edit</button>
                            @method('put')
                            @csrf
                        </form>
                        <ul class="list-group mt-5">
                            @foreach($product->gallery as $photo)
                            {{-- {{ dd($photo->product_photos) }} --}}
                            <li class="list-group-item">
                                <form action="{{ route('products-delete-photo', $photo) }}" method="post">
                                    <div class="gallery">
                                        <img src="{{ asset('products-img') .'/'. $photo->product_photos }}" style="width: 200px; height: 200px; object-fit: contain;">
                                        <button type="submit" class="m-5 btn btn-danger">Delete photo</button>
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
    </div>
@endsection
