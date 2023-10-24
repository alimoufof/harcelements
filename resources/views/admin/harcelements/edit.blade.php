@extends("admin.layoutAdmin.admin")

@section('title', $harcelement->exists ? 'Editer un harcelement' : 'Créer un harcelement')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route($harcelement->exists ? 'admin.harcelement.update' : 'admin.harcelement.store', $harcelement) }}" method="post">

            @csrf
            @method($harcelement->exists ? 'PUT' : 'POST')
            <label for="type" class="form-label">Type de harcelement</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{ $harcelement->exists ? $harcelement->type : old('type') }}">
            @error('type')
            <div class="invalid-deedback">
                {{ $message }}
            </div>
            @enderror
            <div class="mt-4">
                <button class="btn btn-primary">
                    @if($harcelement->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection