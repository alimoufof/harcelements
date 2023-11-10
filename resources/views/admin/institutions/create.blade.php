@extends("admin.layoutAdmin.admin")

@section('title', 'Créer une institution')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route('institution.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('POST')
            <div class="row">
                <div class="col-4">
                    <div class="mb-3 form-group">
                        <label for="user_id" class="form-label">User</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden readonly required>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->prenom }} {{ Auth::user()->prenom }}" disabled>
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3 form-group">
                        <label for="type" class="form-label">Type d'institution</label>
                        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                            <option value="ong" {{ ($institution->type == 'ong' || old('type') == 'ong') ? 'selected' : '' }}>Ong</option>
                            <option value="police" {{ ( $institution->type) == 'police' || old('type' == 'police') ? 'selected' : '' }}>Police</option>
                            <option value="gendarmerie" {{ ( $institution->type) == 'gendarmerie' || old('type' == 'gendarmerie') ? 'selected' : '' }}>Gendarmenie</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>          
                <div class="col-4">
                    <div class="mb-3 form-group">
                        <label for="grade" class="form-label">Grade</label>
                        <input type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" id="grade" value="{{ old('grade') }}">
                        @error('grade')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class=" form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{ old('nom') }}">
                        @error('nom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3 form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3 form-group">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" id="adresse" value="{{ old('adresse') }}">
                        @error('adresse')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">Photo</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="20" rows="5">{{ old('description') }}</textarea>
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