@extends("admin.layoutAdmin.admin")

@section('title', 'Editer un commentaire')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route('commentaire.update', $commentaire) }}" method="post">

            @csrf
            @method($commentaire->exists ? 'PUT' : 'POST')
            <div class="row">
            <div class="col-6">
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
                <div class="col-6">
                    <div class="mb-3">
                        <label for="publication_id" class="form-label">Publication</label>
                        <select name="publication_id" id="publication_id" class="form-control @error('publication_id') is-invalid @enderror">
                            <option value="">Veuillez selectionner le type de publication</option>
                            @foreach($publications as $key => $publication)
                                <option @selected($commentaire->publication_id === $key) value="{{ $key }}">{{ $publication }}</option>
                            @endforeach
                        </select>
                        @error('publication_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="contenu" class="form-label">Contenu</label>
                        <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10">{{ $commentaire->contenu }}</textarea>
                        @error('contenu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
            <div class="mt-4">
                <button class="btn btn-primary">
                    Modifier
                </button>
            </div>
            </div>
        </form>
    </div>
@endsection