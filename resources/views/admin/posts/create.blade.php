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
                  <input type="text" class="form-control" id="title" name="title" placeholder="Dai un titolo al post" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Post Category</label><br>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">Select any category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Inserisci contenuto del post">{{ old('content') }}</textarea>
                </div>

                <div class="mb-3">
                    <h5>Tags:</h5>
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]" {{ in_array($tag->id, old('tags', [] )) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tag-{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Crea</button>
                <a class="btn btn-secondary" onclick="return confirm('Sicuro di volere tornare indietro? I cambiamenti effettuati non verranno salvati.')" href="{{ route('admin.posts.index') }}">Annulla</a>
              </form>
              
        </section>
    </div>
@endsection