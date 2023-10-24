@extends("admin.layoutAdmin.admin")

@section('title', 'Tous les tutoriels')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.tutoriel.create') }}" class="btn btn-primary">Ajouter d'un tutoriel</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id user</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Lien</th>
                    <th scope="col">Id harcelement</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($tutoriels as $tutoriel)
                    <tr>
                        <td>{{ $tutoriel->id }}</td>
                        <td>{{ $tutoriel->user_id }}</td>
                        <td>{{ $tutoriel->titre }}</td>
                        <td>{{ $tutoriel->description }}</td>
                        <td>{{ $tutoriel->link }}</td>
                        <td>{{ $tutoriel->harcelement_id }}</td>
                    <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.tutoriel.edit', $tutoriel) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('admin.tutoriel.destroy', $tutoriel) }}" method="post">
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