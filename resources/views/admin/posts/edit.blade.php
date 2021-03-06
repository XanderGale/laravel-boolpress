@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <section>
            <h3>Modifica Post:</h3>
            <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('PUT')

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
                  <input type="text" class="form-control" id="title" name="title" placeholder="Dai un titolo al post" value="{{ old('title', $post->title ) }}">
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Post Category</label><br>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">Select any category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id && old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Inserisci contenuto del post">{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="mb-3">
                    <h5>Tags:</h5>
                    @foreach ($tags as $tag)
                        <div class="form-check">                          
                            @if ($errors->any())
                                {{-- Se ci sono errori di validazione mi affido all'old per mettere o non mettere il checked --}}
                                <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]" {{ in_array($tag->id, old('tags', [] )) ? 'checked' : '' }}>
                            @else
                                {{-- Se non ci sono errori di validazione, metto il checked in base al tags contains --}}
                                <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                            @endif
                            <label class="form-check-label" for="tag-{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Modifica</button>
                <a class="btn btn-secondary" onclick="return confirm('Sicuro di volere tornare indietro? I cambiamenti effettuati non verranno salvati.')" href="{{ route('admin.posts.index') }}">Annulla</a>
              </form>
              
        </section>
    </div>
@endsection