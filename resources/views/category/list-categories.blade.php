@extends("layout")

@section('title')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="container">
        <a href="/addCategory" class="btn btn-primary">Add Category</a>
        @foreach($categories as $category)
            <div class="row">
                <div class="col">
                    title: {{ $category->title }}
                </div>
                <div class="col">
                    slug: {{ $category->slug }}
                </div>
                <div class="col">
                    <a href="/editCategory?id={{ $category->id }}">edit</a>
                </div>
                <div class="col">
                    <a href="/deleteCategory?id={{ $category->id }}">delete</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection