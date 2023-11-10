@extends("admin.layoutAdmin.admin")

@section('title', 'Tous les blogs')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Ajouter un blog</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->titre }}</td>
                    <td>
                            <a href="{{ route('blog.show', $blog) }}">Voir plus...</a>
                            <div class="d-flex gap-2 justify-content-end align-items-start">
                                <a href="{{ route('blog.edit', $blog) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('blog.destroy', $blog) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection