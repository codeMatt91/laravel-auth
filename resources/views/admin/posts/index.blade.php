@extends('layouts.app');

@section('content')
    <div class="container">
        <header>
            <h1>Post del mio blog</h1>
        </header>
        <table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Creato il</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                    @empty
                        <h1>Non ci sono post</h1>
                    @endforelse
                </tbody>
            </table>

        </table>
    </div>
@endsection
