@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <section>
            <h3 style="margin: 10px">Lista dei post:</h3>
            <div class="row row-cols-3">

                @foreach ($posts as $post)

                <div class="col">
                    <div class="card" style="margin: 10px">
                        {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                        <div class="card-body">
                          <h5 class="card-title">{{ Str::substr($post->title, 0, 50) }} ...</h5>
                          <p class="card-text">{{ Str::substr($post->content, 0, 100) }} ...</p>
                          <a href="#" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>

                @endforeach
            
            </div>
        </section>
    </div>
@endsection