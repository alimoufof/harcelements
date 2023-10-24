@extends("admin.layoutAdmin.admin")

@section('title', $commentaire->exists ? 'Editer un commentaire' : 'Créer un commentaire')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route($commentaire->exists ? 'admin.commentaire.update' : 'admin.commentaire.store', $commentaire) }}" method="post">

            @csrf
            @method($commentaire->exists ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Id user</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ $commentaire->user_id ? $commentaire->user_id : old('user_id') }}">
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="publication_id" class="form-label">Id Publication</label>
                        <input type="text" class="form-control @error('publication_id') is-invalid @enderror" name="publication_id" id="publication_id" value="{{ $commentaire->publication_id ? $commentaire->publication_id : old('publication_id') }}">
                        @error('publication_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="contenu" class="form-label">Contenu</label>
                        <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10">{{ $commentaire->contenu ? $commentaire->contenu : old('contenu') }}</textarea>
                        @error('contenu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
            <div class="mt-4">
                <button class="btn btn-primary">
                    @if($commentaire->exists)
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