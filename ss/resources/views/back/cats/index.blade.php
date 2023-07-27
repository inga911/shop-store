@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Categories List</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <div>
                                        <div>
                                            <p>{{ $category->category_type}}</p>
                                        </div>
                                        <div class="buttons">
                                            <a href="{{ route('cats-edit', $category) }}" class="btn btn-outline-success">Edit</a>
                                            <form action="{{ route('cats-delete', $category) }}" method="post">
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
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
