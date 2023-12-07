<div class="main-content">

    <div class="card bg-white">
        <div class="card-body mt-5 mb-5">

            <form action="{{ route($commentaire->exists ? 'commentaire.update' : 'commentaire.store', $commentaire) }}" method="POST">
                @csrf
                @method($commentaire->exists ? 'PUT' : 'POST')

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
                    <div class="col-md-2">Publication <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <select name="publication_id" id="publication_id" class="form-control @error('publication_id') is-invalid @enderror">
                            <option value="">Veuillez selectionner une publication</option>
                            @foreach($publications as $key => $publication)
                                <option value="{{ $key }}" {{ $commentaire->publication_id == $key || old('publication_id') == $key ? 'selected' : '' }}>{{ $publication }}</option>
                            @endforeach
                        </select>
                        @error('publication_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                     </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">Contenu</div>
                    <div class="col-md-4">
                         <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="contenu" cols="30" rows="10" autofocus="" >{{  $commentaire->exists ? $commentaire->contenu : old('contenu') }}</textarea>
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
                            @if ($commentaire->exists)
                                Modifier un commentaire
                            @else
                                Créer un commentaire
                            @endif
                        </button>
                        {{-- <button class="btn btn-warning" type="reset">Reset</button> --}}
                     </div>
                </div>

            </form>
      
        </div>
    </div>
</div>