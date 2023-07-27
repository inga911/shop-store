@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Edit <b><i>{{$category->category_type}}</i></b></h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cats-update', $category) }}" method="post">
                            <div class="mb-3">
                                <label class="form-label">Category type</label>
                                <input type="text" class="form-control" name="category_type" value="{{ old('category_type', $category->category_type) }}">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Edit</button>
                            @method('put')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
