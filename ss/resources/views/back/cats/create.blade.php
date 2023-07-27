@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Add new category</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cats-store') }}" method="post">
                            <div class="mb-3">
                                <label class="form-label">Category title</label>
                                <input type="text" class="form-control" name="category_type" value="{{ old('category_type') }}">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Add to list</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
