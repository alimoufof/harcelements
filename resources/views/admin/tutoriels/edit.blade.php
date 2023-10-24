@extends("admin.layoutAdmin.admin")

@section('title', $tutoriel->exists ? 'Editer un tutoriel' : 'Créer un tutoriel')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route($tutoriel->exists ? 'admin.tutoriel.update' : 'admin.tutoriel.store', $tutoriel) }}" method="post">

            @csrf
            @method($tutoriel->exists ? 'PUT' : 'POST')
            
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Id user</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ $tutoriel->user_id ? $tutoriel->user_id : old('user_id') }}">
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
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ $tutoriel->titre ? $tutoriel->titre : old('titre') }}">
                        @error('titre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ $tutoriel->description ? $tutoriel->description : old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="link" class="form-label">Lien</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{ $tutoriel->link ? $tutoriel->link : old('link') }}">
                        @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="harcelement_id" class="form-label">Id harcelement</label>
                        <input type="text" class="form-control @error('harcelement_id') is-invalid @enderror" name="harcelement_id" id="harcelement_id" value="{{ $tutoriel->harcelement_id ? $tutoriel->harcelement_id : old('harcelement_id') }}">
                        @error('harcelement_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            <div class="mt-4">
                <button class="btn btn-primary">
                    @if($tutoriel->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection