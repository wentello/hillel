@extends("layout")

@section('title')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="container">
        <a href="/category" class="btn btn-primary">Categories</a>
        <a href="/tags" class="btn btn-primary">Tags</a>
        <a href="/post" class="btn btn-primary">Post</a>
    </div>
@endsection