@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3">{{ $post->title }}</h2>
        <div class="d-flex mb-3">
            <img width="100px" src="{{ $post->image }}"
                alt="{{ $post->title }}">
            <p class="ml-3">{{ $post->content }}</p>
        </div>
        <a href="{{ route('admin.posts.index') }}"
            class="btn btn-secondary">Indietro</a>
    </div>
@endsection
