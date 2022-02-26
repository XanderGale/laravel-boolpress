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
                          <a href="#" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            
            </div>
        </section>
    </div>
@endsection