@extends("admin.layoutAdmin.admin")

@section('title', 'Tous les commentaires')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('commentaire.create') }}" class="btn btn-primary">Ajouter un commentaire</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Publication</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($commentaires as $commentaire)
                    <tr>
                        <td>{{ $commentaire->id }}</td>
                        <td>{{ $commentaire->user->prenom . ' ' . $commentaire->user->nom }}</td>
                        <td>{{ $commentaire->contenu }}</td>
                        <td>{{ $commentaire->publication->type }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('commentaire.edit', $commentaire) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('commentaire.destroy', $commentaire) }}" method="post">
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