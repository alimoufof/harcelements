<div class="main-content">

    <div class="card bg-white">
        <div class="card-body mt-5 mb-5">

            <form action="{{ route($institution->exists ? 'institution.update' : 'institution.store', $institution) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($institution->exists ? 'PUT' : 'POST')

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
                    <div class="col-md-2">Type d'institution <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
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

                <div class="form-group row">
                    <div class="col-md-2">Nom <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{ $institution->exists ? $institution->nom : old('nom') }}" autofocus="" >
                        @error('nom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-2">Grade <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" id="grade" value="{{ $institution->exists ? $institution->grade : old('grade') }}" autofocus="" >
                        @error('grade')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-2">Email <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $institution->exists ? $institution->email : old('email') }}" autofocus="" >
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-2">Adresse <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" id="adresse" value="{{ $institution->exists ? $institution->adresse : old('adresse') }}" autofocus="" >
                        @error('adresse')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-2">Description <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                         <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10" autofocus="" >{{  $institution->exists ? $institution->description : old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2 pt-5">Photo institution <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <div class="add-photo">
                            <div id='img_contain'>
                              <img id="preview-thumb" align='middle'src="{{ asset('storage/' . $institution->image) }}" alt="{{$institution->nom}}" title=''/>
                            </div>
                            <div class="fileUploadInput">
                                <input type="file" name="image" id="file-input-profile" class="@error('image') is-invalid @enderror" value="{{ $institution->exists ? $institution->image : old('image') }}"/>
                                <button class="input-file-btn"><i class="material-icons"> cloud_upload </i></button>
                            </div>
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                     </div>
                </div>

                <div class="form-group pt-2 row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <button class="theme-primary-btn btn btn-success" type="submit">
                            @if ($institution->exists)
                                Modifier une institution
                            @else
                                Créer une institution
                            @endif
                        </button>
                        {{-- <button class="btn btn-warning" type="reset">Reset</button> --}}
                     </div>
                </div>

            </form>
      
        </div>
    </div>
</div>