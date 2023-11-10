@extends("admin.layoutAdmin.admin")

@section('title', 'Toutes les publications')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('publication.create') }}" class="btn btn-primary">Ajouter une publication</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Type</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Harcelement</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($publications as $publication)
                    <tr>
                        <td>{{ $publication->id }}</td>
                        <td>{{ $publication->user->prenom . ' ' . $publication->user->nom }}</td>
                        <td>{{ $publication->type }}</td>
                        <td>{{ $publication->titre }}</td>
                        <td>{{ $publication->description }}</td>
                        <td>{{ $publication->contenu }}</td>
                        <td>{{ $publication->harcelement->type }}</td>
                    <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('publication.edit', $publication) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('publication.destroy', $publication) }}" method="post">
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