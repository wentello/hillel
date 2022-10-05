@extends("layout")

@section('title')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="container">
        <a href="/tags/create" class="btn btn-primary">Add Tag</a>
        @foreach($tags as $tag)
            <div class="row">
                <div class="col">
                    title: {{ $tag->title }}
                </div>
                <div class="col">
                    slug: {{ $tag->slug }}
                </div>
                <div class="col">
                    post:
                    @if(!@empty($arrPostTags[$tag->id]))
                        @foreach($arrPostTags[$tag->id] as $post)
                            {{ $post->title }}<br>
                        @endforeach
                    @endif
                </div>
                <div class="col">
                    <a href="/tags/{{ $tag->id }}/edit">edit</a>
                </div>
                <div class="col">
                    <a href="/tags/{{ $tag->id }}/delete">delete</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection