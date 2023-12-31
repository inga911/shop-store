@inject('categories', App\Services\CategoriesService::class)
<div class="col-3">
    <div class="card mt-5">
        <div class="card-header">
            <h1 class="cat-card-title">Categories</h1>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <div>
                    <a href="{{route('front-index')}}" class="cat-links --cat--links">All products</a>
                </div>
                @forelse($categories->get() as $category)
                    <div>
                        <a href="{{ route('front-single-category', $category) }}" class="cat-links --cat--links">{{ $category->category_type }}</a>
                    </div>
                @empty
                    <li class="list-group-item">
                        <div>No categories</div>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
