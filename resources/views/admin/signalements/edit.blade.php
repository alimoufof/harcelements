@extends("admin.layoutAdmin.admin")

@section('title', $signalement->exists ? 'Editer un signalement' : 'Créer un signalement')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route($signalement->exists ? 'admin.signalement.update' : 'admin.signalement.store', $signalement) }}" method="post">

            @csrf
            @method($signalement->exists ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Id user</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ $signalement->user_id ? $signalement->user_id : old('user_id') }}">
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ $signalement->titre ? $signalement->titre : old('titre') }}">
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
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $signalement->description ? $signalement->description : old('description') }}">
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
                        <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10">{{ $signalement->contenu ? $signalement->contenu : old('contenu') }}</textarea>
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
                        <input type="text" class="form-control @error('harcelement_id') is-invalid @enderror" name="harcelement_id" id="harcelement_id" value="{{ $signalement->harcelement_id ? $signalement->harcelement_id : old('harcelement_id') }}">
                        @error('harcelement_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            <div class="mt-4">
                <button class="btn btn-primary">
                    @if($signalement->exists)
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