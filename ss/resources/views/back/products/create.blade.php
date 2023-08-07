@extends('layouts.app')

@section('content')
    <div class="container product-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1  class="card-title">Add new product</h1>
                    </div>
                    <div class="card-body products-inputs">
                        <form action="{{ route('products-store') }}" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Product title <small id="characterCount"></small></label>
                                <input type="text" class="form-control" name="product_title"
                                    value="{{ old('product_title') }}" oninput="countCharacters(this)" maxlength="100" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product description <small id="characterCount"></small></label>
                                <textarea type="text" oninput="countCharacters(this)" maxlength="500" rows="5" cols="40" class="form-control" name="product_description">{{ old('product_description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">How to use product <small id="characterCount"></small></label>
                                <textarea type="text" oninput="countCharacters(this)" maxlength="300"  rows="5" cols="40" class="form-control" name="product_how_to_use">{{ old('product_how_to_use') }} </textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Warnings <small id="characterCount"></small></label>
                                <textarea type="text" oninput="countCharacters(this)" maxlength="500"  rows="5" cols="40" class="form-control" name="product_warnings"> {{ old('product_warnings') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ingredients </label>
                                <textarea type="text" oninput="countCharacters(this)" maxlength="600"  rows="5" cols="40" class="form-control" name="product_ingredients">{{ old('product_ingredients') }}</textarea>
                                <small id="characterCount"></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control price-input" name="product_price"
                                    value="{{ old('product_price') }}">
                            </div>
                            <div class="cat-selection">
                                <div>
                                <label class="form-label">Product Category</label>
                                <select class="form-select" name="category_id">
                                    <option value="0">Categories list</option>
                                    @foreach ($cats as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category_type }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <p class="form-text">Please select product category here</p>
                            </div>

                            <div class="create-main-photo">
                                <label class="form-label">Upload Main Product photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>


                            <div class="mb-3 gallery-col" data-gallery="0">
                                <label class="form-label"> <span class="rem">X</span> Gallery photo</label>
                                <input type="file" class="form-control">
                            </div>

                            <div class="gallery-inputs">

                            </div>

                            <button type="button" class="btn-add-gallery --add--gallery">Add gallery photo</button>

                            <button type="submit" class="btn-edit-product">Add to list</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function countCharacters(input) {
            const maxLength = input.getAttribute("maxlength");
            const currentLength = input.value.length;
            const remaining = maxLength - currentLength;
            const characterCount = document.getElementById("characterCount");
            characterCount.textContent = `${remaining} / ${maxLength}`;
        }
    </script>
@endsection
