@extends("admin.layoutAdmin.admin")

@section('title', 'Toutes les institutions')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.institution.create') }}" class="btn btn-primary">Ajouter une institution</a>
    </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Id user</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Photo d'institution</th>
                    <th scope="col">Description</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($institutions as $institution)
                    <tr>
                        <td>{{ $institution->id }}</td>
                        <td>{{ $institution->type }}</td>
                        <td>{{ $institution->user_id }}</td>
                        <td>{{ $institution->grade }}</td>
                        <td>{{ $institution->nom }}</td>
                        <td>
                            @if($institution->image)
                                <img src="{{ asset($institution->image) }}" alt="Photo d'institution" width="100">
                            @else
                                Aucune image
                            @endif
                        </td>
                        <td>{{ $institution->description }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.institution.edit', $institution) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('admin.institution.destroy', $institution) }}" method="post">
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