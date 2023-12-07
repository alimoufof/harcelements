<div class="main-content">

    <div class="card bg-white">
        <div class="card-body mt-5 mb-5">
            <form action="{{ route($harcelement->exists ? 'harcelement.update' : 'harcelement.store', $harcelement) }}" method="POST">
                @csrf
                @method($harcelement->exists ? 'PUT' : 'POST')
                
                <div class="form-group row">
                    <div class="col-md-2">Harcelement  <span class="text-danger"> * </span></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{ $harcelement->exists ? $harcelement->type : old('type') }}" autofocus="" >
                        @error('type')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group pt-2 row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <button class="theme-primary-btn btn btn-success" type="submit">
                            @if ($harcelement->exists)
                                Modifier un harcelement
                            @else
                                Créer un harcelement
                            @endif
                        </button>
                        {{-- <button class="btn btn-warning" type="reset">Reset</button> --}}
                     </div>
                </div>

            </form>
      
        </div>
    </div>
</div>