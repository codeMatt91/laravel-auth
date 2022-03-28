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
        <!-- MESSAGGIO DI CONFERMA ELIMINAZIONE -->
        @if (session('message'))
            <div class="alert alert-{{ session('type') ?? 'info' }}">
                {{ session('message') }}
            </div>
        @endif
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
                            <td class="d-flex">
                                <div>
                                    <form class="delete-form"
                                        action="{{ route('admin.posts.destroy', $post->id) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger "
                                            type="submit">Elimina</button>
                                    </form>
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-warning m-0 ml-2 "
                                        href="{{ route('admin.posts.edit', $post->id) }}">Modifica
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <h1>Non ci sono post</h1>
                    @endforelse
                </tbody>
            </table>
        </table>

        @section('scripts')
            <script>
                // METODO PER APRIRE UNA MODALE E CHIEDERE CONFERMA ELIMINAZIONE
                const delectForm = document.querySelectorAll('.delete-form');

                deleteForm.forEach(form => {
                    form.addEventListener('submit', (e) => {
                        e.preventDefault();

                        const accept = confirm(
                            'Are you sure you want to delete this?');
                        if (accept) e.target.submit();
                    });
                });
            </script>
        @endsection
    </div>
@endsection
