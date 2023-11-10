@extends("admin.layoutAdmin.admin")

@section('title', 'Editer un blog')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route('blog.update', $blog) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden readonly required>
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
                            <option value="{{ $key }}" @if($blog->harcelement_id == $key) selected @endif>{{ $harcelement }}</option>
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
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ $blog->titre ? $blog->titre : old('titre') }}">
                        @error('titre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4"> 
                    <div class="mb-3">
                        <label for="photo" class="form-label">Image</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{ $blog->photo }}">
                        <img src="{{ asset('storage/' . $blog->photo) }}" alt="{{ Auth::user()->prenom }} {{ Auth::user()->nom }}" width="100">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ $blog->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="contenu" class="form-label">Contenu</label>
                        <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10">{{ $blog->contenu }}</textarea>
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