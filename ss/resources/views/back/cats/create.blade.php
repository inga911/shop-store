@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="card-title">Add new category</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cats-store') }}" method="post">
                            <div class="inputs mb-3">
                                <label class="form-label">Category title</label>
                                <input type="text" class="form-control" name="category_type" value="{{ old('category_type') }}">
                                <button type="submit" class="btn-add">Add to list</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
