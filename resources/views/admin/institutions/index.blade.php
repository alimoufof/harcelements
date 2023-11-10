@extends("admin.layoutAdmin.admin")

@section('title', 'Toutes les institutions')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('institution.create') }}" class="btn btn-primary">Ajouter une institution</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($institutions as $institution)
                    <tr>
                        <td>{{ $institution->id }}</td>
                        <td>{{ $institution->type }}</td>
                        <td>
                            <a href="{{ route('institution.show', $institution) }}">Voir plus...</a>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('institution.edit', $institution) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('institution.destroy', $institution) }}" method="post">
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