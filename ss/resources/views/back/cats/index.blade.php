@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="card-title">Categories List</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item">

                                    <div class="category-type">
                                        <a href="{{ route('front-single-category', $category) }}" class="category-link">
                                            <p class="cat-title">{{ $category->category_type }}</p>
                                        </a>
                                    </div>
                                    <div class="buttons">
                                        <a href="{{ route('cats-edit', $category) }}"
                                            class="btn-edit">Edit</a>
                                        <form action="{{ route('cats-delete', $category) }}" method="post">
                                            <button type="submit" class="btn-delete">Delete</button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
