<div class="main-content">

    <div class="card bg-white">
        <div class="card-body mt-5 mb-5">

            <form action="{{ route($publication->exists ? 'publication.update' : 'publication.store', $publication) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($publication->exists ? 'PUT' : 'POST') 

                <div class="form-group row">
                    <div class="col-md-2">User <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <input id="user_id" type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id  }}" required readonly hidden>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->prenom }} {{ Auth::user()->nom  }}" disabled autofocus="" >
                        @error('user_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">Harcelement <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <select name="harcelement_id" id="harcelement_id" class="form-control @error('harcelement_id') is-invalid @enderror">
                            <option value="">Veuillez selectionner un harcelement</option>
                            @foreach($harcelements as $key => $harcelement)
                                <option value="{{ $key }}" {{ $publication->harcelement_id == $key || old('harcelement_id') == $key ? 'selected' : '' }}>{{ $harcelement }}</option>
                            @endforeach
                        </select>
                        @error('harcelement_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                     </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">Titre <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" id="titre" value="{{ $publication->exists ? $publication->titre : old('titre') }}" autofocus="" >
                        @error('titre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="col-6">
                    <div class="">
                        <label for="titre" class="form-label">Type</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{ old('type') }}">
                        @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">Description <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                         <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10" autofocus="" >{{  $publication->exists ? $publication->description : old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">Contenu <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                         <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10" autofocus="" >{{  $publication->exists ? $publication->contenu : old('contenu') }}</textarea>
                            @error('contenu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>

                <div class="form-group pt-2 row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <button class="theme-primary-btn btn btn-success" type="submit">
                            @if ($publication->exists)
                                Modifier une publication
                            @else
                                Créer une publication
                            @endif
                        </button>
                        {{-- <button class="btn btn-warning" type="reset">Reset</button> --}}
                     </div>
                </div>

            </form>
      
        </div>
    </div>
</div>