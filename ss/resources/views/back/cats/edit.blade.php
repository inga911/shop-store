@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="card-title">Edit <b>{{$category->category_type}}</b></h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cats-update', $category) }}" method="post">
                            <div class="inputs mb-3">
                                <label class="form-label">Category type</label>
                                <input type="text" class="form-control" name="category_type" value="{{ old('category_type', $category->category_type) }}">
                                <button type="submit" class="btn-add edit">Edit</button>
                            </div>
                            @method('put')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
