@extends("admin.layoutAdmin.admin")

@section('title', 'Tous les harcelements')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('harcelement.create') }}" class="btn btn-primary">Ajouter un harcelemnt</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type de harcelement</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($harcelements as $harcelement)
                    <tr>
                        <td>{{ $harcelement->id }}</td>
                        <td>{{ $harcelement->type }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('harcelement.edit', $harcelement) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('harcelement.destroy', $harcelement) }}" method="post">
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