@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h1>Lista delle categorie:</h1>

    <ul>
        @foreach($categories as $category)
        <li>
            <a href="{{ route('admin.category_info', ['slug' => $category->slug ]) }}">{{ $category->name }}</a>
        </li>
        @endforeach
    </ul>

</div>

@endsection