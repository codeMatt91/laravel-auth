@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf

            <!-- TITOLO -->
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <!-- CONTENUTO POST -->
            <div class="form-group">
                <label for="description">Contenuto</label>
                <textarea id="description" rows="6" class="form-control" name="content"
                    placeholder="Contenuto del post.."></textarea>
            </div>

            <!-- IMMAGINE -->
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ route('admin.posts.index') }}"
                class="btn btn-secondary">Indietro</a>
        </form>
    </div>
@endsection
