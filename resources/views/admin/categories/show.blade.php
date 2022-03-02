@extends('layouts.dashboard')

@section('content')

<div class="container">
    <h1>Post relativi alla categoria {{ $category->name }}:</h1>

    @forelse ($category_posts as $category_post)
        <h5>{{$category_post->title}}</h5>
        <a href="{{ Route('admin.posts.show', ['post' => $category_post->id]) }}">Vai al post</a>
    @empty
        <h5>No posts found</h5>
    @endforelse

</div>

@endsection