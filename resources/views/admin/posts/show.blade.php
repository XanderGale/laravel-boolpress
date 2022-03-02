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
                          <h5 class="card-title">{{ $post->title }}</h5>
                          <p class="card-text">{{ $post->content }}</p>
                          <p style="margin: 30px 0; color: blue;"><strong style="color: black;">Post slug:</strong> {{ $post->slug }}</p>
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