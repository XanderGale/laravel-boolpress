@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h1>Lista delle categorie:</h1>

    <div class="list-group">
        @foreach($categories as $category)
            <a class="list-group-item list-group-item-action" href="{{ route('admin.category_info', ['slug' => $category->slug ]) }}">{{ $category->name }}</a>
        @endforeach
    </div>

</div>

@endsection