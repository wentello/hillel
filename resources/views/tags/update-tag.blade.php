@extends("layout")

@section('title')
<h1>{{ $pageTitle }}</h1>
@endsection

@section('content')
<form method="post">
    <input type="hidden" name="id" value="{{ $id }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <label>title:</label>
                <input class="form-control" name="title" value="{{ $title }}">
            </div>
            <div class="col">
                <label>slug</label>
                <input class="form-control" name="slug" value="{{ $slug }}">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
@endsection