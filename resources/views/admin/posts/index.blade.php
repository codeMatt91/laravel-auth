@extends('layouts.app');

@section('content')
    <div class="container">
        <header class="d-flex justify-content-between">
            <h1>Post del mio blog</h1>
            <div>
                <a href="{{ route('admin.posts.create') }}"
                    class="btn btn-sm btn-success">Aggiungi Post</a>
            </div>
        </header>
        <table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Creato il:</th>
                        <th scope="col">Modificato il:</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td><a
                                    href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                            </td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>
                                <form
                                    action="{{ route('admin.posts.destroy', $post->id) }}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger"
                                        type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h1>Non ci sono post</h1>
                    @endforelse
                </tbody>
            </table>
        </table>
    </div>
@endsection
