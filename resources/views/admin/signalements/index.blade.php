@extends("admin.layoutAdmin.admin")

@section('title', 'Tous les signalements')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('signalement.create') }}" class="btn btn-primary">Ajouter un signalement</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Harcelement</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($signalements as $signalement)
                    <tr>
                        <td>{{ $signalement->id }}</td>
                        <td>{{ $signalement->user->nom . ' ' . $signalement->user->prenom }}</td>
                        <td>{{ $signalement->titre }}</td>
                        <td>{{ $signalement->description }}</td>
                        <td>{{ $signalement->contenu }}</td>
                        <td>{{ $signalement->harcelement->type }}</td>
                    <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('signalement.edit', $signalement) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('signalement.destroy', $signalement) }}" method="post">
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