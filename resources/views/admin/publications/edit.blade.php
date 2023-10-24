@extends("admin.layoutAdmin.admin")

@section('title', $publication->exists ? 'Editer un publication' : 'Créer un publication')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route($publication->exists ? 'admin.publication.update' : 'admin.publication.store', $publication) }}" method="post">

            @csrf
            @method($publication->exists ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Id user</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ $publication->user_id ? $publication->user_id : old('user_id') }}">
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
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
                <div class="col-6">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ $publication->titre ? $publication->titre : old('titre') }}">
                        @error('titre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $publication->description ? $publication->description : old('description') }}">
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
                        <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10">{{ $publication->contenu ? $publication->contenu : old('contenu') }}</textarea>
                        @error('contenu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="harcelement_id" class="form-label">Id harcelement</label>
                        <input type="text" class="form-control @error('harcelement_id') is-invalid @enderror" name="harcelement_id" id="harcelement_id" value="{{ $publication->harcelement_id ? $publication->harcelement_id : old('harcelement_id') }}">
                        @error('harcelement_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            <div class="mt-4">
                <button class="btn btn-primary">
                    @if($publication->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
            </div>
        </form>
    </div>
@endsection