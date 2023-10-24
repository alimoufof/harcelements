@extends("admin.layoutAdmin.admin")

@section('title', $institution->exists ? 'Editer une institution' : 'Créer une institution')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route($institution->exists ? 'admin.institution.update' : 'admin.institution.store', $institution) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method($institution->exists ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type de institution</label>
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

                
                
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Id user</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ $institution->user_id ? $institution->user_id : old('user_id') }}">
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <input type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" id="grade" value="{{ $institution->grade ? $institution->grade : old('grade') }}">
                        @error('grade')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{ $institution->nom ? $institution->nom : old('nom') }}">
                        @error('nom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Photo</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ $institution->image ? $institution->image : old('image') }}"*>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ $institution->description ? $institution->description : old('description') }}</textarea>
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
                    @if($institution->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection