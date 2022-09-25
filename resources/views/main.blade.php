@extends("layout")

@section('title')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    <div class="container">
        <a href="/category.php" class="btn btn-primary">Categories</a>
        <a href="/tags.php" class="btn btn-primary">Tags</a>
    </div>
@endsection