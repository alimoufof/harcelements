<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title') | Administration</title>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex justify-content-between">
          <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('home') }}">Accueil</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('signalement.index') }}">Signalement</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('harcelement.index') }}">Harcelement</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('tutoriel.index') }}">tutoriel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('publication.index') }}">Publication</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('commentaire.index') }}">Commentaire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('institution.index') }}">Institution</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Paramètres
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Utilisateurs</a></li>
                  <li><a class="dropdown-item" href="#">Roles</a></li>
                  <li><a class="dropdown-item" href="#">Permission</a></li>
                  <li><a class="dropdown-item" href="#">Configuration</a></li>
                </ul>
              </li>
            </ul>
            <div>
            <div class="dropdown">
              <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Alimou Fofana
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="#">Deconnexion</a></li>
              </ul>
            </div>
            </div>
          </div>
          
          </div>
      </nav>
     </div>
    </div>
    <div class="container mt-5">
    
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

        @yield('content') 
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>