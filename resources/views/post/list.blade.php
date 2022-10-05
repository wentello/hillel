@extends("layout")

@section('title')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="container">
        <a href="/post/create" class="btn btn-primary">Add Post</a>
        @foreach($posts as $post)
            <div class="row">
                <div class="col">
                    title: {{ $post->title }}
                </div>
                <div class="col">
                    slug: {{ $post->slug }}
                </div>
                <div class="col">
                    categoty:
                    @foreach($categories as $category)
                        @if($category->id == $post->category_id)
                            {{ $category->title }}
                        @endif
                    @endforeach
                </div>
                <div class="col">
                    <a href="/post/{{ $post->id }}/edit">edit</a>
                </div>
                <div class="col">
                    <a href="/post/{{ $post->id }}/delete">delete</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection