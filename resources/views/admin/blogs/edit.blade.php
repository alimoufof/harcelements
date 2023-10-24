@extends("admin.layoutAdmin.admin")

@section('title', $blog->exists ? 'Editer un blog' : 'Créer un blog')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route($blog->exists ? 'admin.blog.update' : 'admin.blog.store', $blog) }}" method="post">

            @csrf
            @method($blog->exists ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Id user</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ $blog->user_id ? $blog->user_id : old('user_id') }}">
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6"> 
                    <div class="mb-3">
                        <label for="photo" class="form-label">Image</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{ $blog->photo ? $blog->photo : old('photo') }}"*>
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ $blog->titre ? $blog->titre : old('titre') }}">
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
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $blog->description ? $blog->description : old('description') }}">
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
                        <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10">{{ $blog->contenu ? $blog->contenu : old('contenu') }}</textarea>
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
                        <input type="text" class="form-control @error('harcelement_id') is-invalid @enderror" name="harcelement_id" id="harcelement_id" value="{{ $blog->harcelement_id ? $blog->harcelement_id : old('harcelement_id') }}">
                        @error('harcelement_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            <div class="mt-4">
                <button class="btn btn-primary">
                    @if($blog->exists)
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