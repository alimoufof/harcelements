@extends("admin.layoutAdmin.admin")

@section('title', 'Tous les blogs')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Ajouter un blog</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id user</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Id harcelement</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->user_id }}</td>
                        <td>
                            @if($blog->photo)
                                <img src="{{ isset($blog->photo) }}" alt="Image bloc" width="100">
                            @else
                                Aucune image
                            @endif
                        </td>
                        <td>{{ $blog->titre }}</td>
                        <td>{{ $blog->description }}</td>
                        <td>{{ $blog->contenu }}</td>
                        <td>{{ $blog->harcelement_id }}</td>
                    <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('admin.blog.destroy', $blog) }}" method="post">
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