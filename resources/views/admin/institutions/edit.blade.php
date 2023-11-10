@extends("admin.layoutAdmin.admin")

@section('title', 'Editer une institution')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route('institution.update', $institution) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <div class="mb-3 form-group">
                        <label for="user_id" class="form-label">User</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->id }}" required readonly hidden>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->prenom }} {{ Auth::user()->nom }}" disabled>
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
                        <input type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" id="grade" value="{{ $institution->grade }}">
                        @error('grade')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3 form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{ $institution->nom }}">
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
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $institution->email }}">
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
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" id="adresse" value="{{ $institution->adresse }}">
                        @error('adresse')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3 form-group">
                        <label for="image" class="form-label">Photo</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ $institution->image }}">
                        @if($institution->image)
                            <img src="{{ asset('storage/' . $institution->image) }}" alt="{{ $institution->nom}} {{$institution->prenom}}" width="100">
                        @endif
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="20" rows="5">{{ $institution->description }}</textarea>
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
                        Modifier
                </button>
            </div>
        </form>
    </div>
@endsection