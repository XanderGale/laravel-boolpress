@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <section>
            <h3>Crea nuovo Post:</h3>
            <form action="{{ route('admin.posts.store') }}" method="post">
                @csrf
                @method('POST')

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <div class="mb-3">
                  <label for="title" class="form-label">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Dai un titolo al post">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Inserisci contenuto del post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Crea</button>
              </form>
              
        </section>
    </div>
@endsection