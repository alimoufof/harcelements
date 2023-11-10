@extends("admin.layoutAdmin.admin")

@section('title', 'Détails du Blog')

@section('content')
<div class="container">
    <h1>{{ $blog->titre }}</h1>
    
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('storage/' . $blog->photo) }}" alt="{{ $blog->titre }}" class="img-fluid">
            <p>{{ $blog->description }}</p>
            <p>{{ $blog->contenu }}</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails du Blog</h5>
                    <p class="card-text"><strong>Auteur:</strong> {{ $blog->user->prenom }} {{ $blog->user->nom }}</p>
                    <p class="card-text"><strong>Harcelement:</strong> {{ $blog->harcelement->type }}</p>
                    <p class="card-text"><strong>Date de création:</strong> {{ $blog->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('blog.index') }}" class="btn btn-primary mt-3">Retour à la liste des blogs</a>
</div>
@endsection
