@extends("admin.layoutAdmin.admin")

@section('title', 'Créer un tutoriel')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route('tutoriel.store', $tutoriel) }}" method="post">

            @csrf
            @method('POST')
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <input type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->id }}" required readonly hidden>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->prenom }} {{ Auth::user()->nom }}" disabled>
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="harcelement_id" class="form-label">Harcelement</label>
                        <select name="harcelement_id" id="harcelement_id" class="form-control @error('harcelement_id') is-invalid @enderror">
                            <option value="">Veuillez séléctionner un harcelement</option>
                            @foreach($harcelements as $key => $harcelement)
                                <option value="{{ $key }}" {{ old('harcelement_id') == $key ? 'selected' : '' }}>{{ $harcelement }}</option>
                            @endforeach
                        </select>
                        @error('harcelement_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ old('titre') }}">
                        @error('titre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="link" class="form-label">Lien</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{ old('link') }}">
                        @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary">
                        Créer
                </button>
            </div>
        </form>
    </div>
@endsection