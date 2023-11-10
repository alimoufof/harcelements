@extends("admin.layoutAdmin.admin")

@section('title', 'Editer un harcelement')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
    
        <form action="{{ route('harcelement.update', $harcelement) }}" method="post">

            @csrf
            @method('PUT')
            <label for="type" class="form-label">Type de harcelement</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{ $harcelement->type }}">
            @error('type')
            <div class="invalid-deedback">
                {{ $message }}
            </div>
            @enderror
            <div class="mt-4">
                <button class="btn btn-primary">
                        Modifier
                </button>
            </div>
        </form>
    </div>
@endsection