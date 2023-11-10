@extends("admin.layoutAdmin.admin")

@section('title', 'Créer un publication')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route('publication.store', $publication) }}" method="post">

            @csrf
            @method('POST')
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <input type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden readonly required>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->prenom}} {{ Auth::user()->nom}}" disabled>
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                            <option value="forum" {{ ($publication->type == 'forum' || old('type') == 'forum') ? 'selected' : '' }}>Forum</option>
                            <option value="evenement" {{ ($publication->type == 'evenement' || old('type') == 'evenement') ? 'selected' : '' }}>Evenement</option>
                        </select>
                        @error('type')
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
                <div class="col-6">
                    <div class="">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ old('titre') }}">
                        @error('titre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="10" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="contenu" class="form-label">Contenu</label>
                        <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10">{{ old('contenu') }}</textarea>
                        @error('contenu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <div class="mt-4">
                        <button class="btn btn-primary">
                                Créer
                        </button>
                    </div>             
                </div>
            </div>
        </form>
    </div>
@endsection