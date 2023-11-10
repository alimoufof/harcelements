@extends('admin.layoutAdmin.admin')

@section('title')

@section('content')
<div class="container">
    <h1>{{ $institution->nom }}</h1>
    
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('storage/' . $institution->image) }}" alt="{{ $institution->titre }}" class="img-fluid">
            <p>{{ $institution->type }}</p>
            <p>{{ $institution->grade }}</p>
            <p>{{ $institution->description }}</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails de l'institution</h5>
                    <p class="card-text"><strong>Auteur:</strong> {{ $institution->user->prenom }} {{ $institution->user->nom }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $institution->email }}</p>
                    <p class="card-text"><strong>Adresse:</strong> {{ $institution->address }}</p>
                    <p class="card-text"><strong>Date de création:</strong> {{ $institution->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('institution.index') }}" class="btn btn-primary mt-3">Retour à la liste des institutions</a>
</div>
@endsection
