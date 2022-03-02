@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <section>
            <h3 style="margin: 10px">Lista dei post della categoria "{{ $category->name }}":</h3>
            <div class="row row-cols-3">

                @forelse ($category_posts as $post)

                <div class="col">
                    <div class="card" style="margin: 10px">
                        {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                        <div class="card-body">
                          <h5 class="card-title">{{ Str::substr($post->title, 0, 50) }} ...</h5>
                          <p class="card-text">{{ Str::substr($post->content, 0, 100) }} ...</p>
                          <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>

                @empty

                <h5>Non ci sono post con questa categoria</h5>

                @endforelse
            
            </div>
        </section>
    </div>
@endsection