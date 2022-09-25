@extends("layout")

@section('title')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="container">
    <a href="/addTag.php" class="btn btn-primary">Add Tag</a>
    @foreach($tags as $tag)
    <div class="row">
        <div class="col">
            title: {{ $tag->title }}
        </div>
        <div class="col">
            slug: {{ $tag->slug }}
        </div>
        <div class="col">
            <a href="/editTag.php?id={{ $tag->id }}">edit</a>
        </div>
        <div class="col">
            <a href="/deleteTag.php?id={{ $tag->id }}">delete</a>
        </div>
    </div>
    @endforeach

</div>
@endsection