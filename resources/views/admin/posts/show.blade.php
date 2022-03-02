@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <section>
            <h3 style="margin: 10px">Anteprima Post:</h3>
            <div class="row">

                <div class="col">
                    <div class="card" style="width: 100%;">
                        {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                        <div class="card-body">
                            @if ($post->category)
                            <p class="card-text float-right">{{ $post->category->name }}</p>
                            @endif
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <p style="font-weight: bolder" class="d-inline-block">Tags:</p>
                            @forelse ($post->tags as $tag)
                                <span>{{ $tag->name }}{{ $loop->last ? '.' : ',' }}</span>
                            @empty
                                <span>Nessuno.</span>
                            @endforelse
                            <p class="card-text"></p>
                            <p style="margin: 15px 0; color: blue;"><strong style="color: black;">Post slug:</strong> {{ $post->slug }}</p>
                            <a href="{{ route('admin.posts.edit', ['post' => $post->id ]) }}" class="btn btn-primary">Edit</a>
                            <div style="display: inline-block; margin-left: auto;">
                            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" >
                                @csrf
                                @method('DELETE')
                                  <button onclick="return confirm('Sicuro di cancellare definitivamente il post?')" class="btn btn-danger">Delete</button>
                              </form>
                          </div>
                          
                        </div>
                    </div>
                </div>
            
            </div>
        </section>
    </div>
@endsection