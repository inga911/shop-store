@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Add new product</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products-store') }}" method="post" enctype="multipart/form-data">
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
                                        <option value="{{ $cat->id }}">{{ $cat->category_type }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">Please select product category here</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Upload Main Product photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>


                            <div class="mb-3" data-gallery="0">
                                <label class="form-label">Gallery photo <span class="rem">X</span></label>
                                <input type="file" class="form-control">
                            </div>

                            <div class="gallery-inputs">

                            </div>

                            <button type="button" class="btn btn-secondary --add--gallery">add gallery photo</button>

                            <button type="submit" class="btn btn-outline-primary">Add to list</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
