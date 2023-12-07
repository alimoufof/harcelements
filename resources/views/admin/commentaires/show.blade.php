
<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials.head')

</head>
<body>

<!-- Prealoder -->
<div class="spinner_body">
   <div class="spinner"></div>  
</div>

<!-- Prealoder -->


<!--====== Start Header Section======-->
    @include('layouts.partials.navbar')
<!--====== End Header Section======-->


<!--====== Start Left Sidebar Section======-->
    @include('layouts.partials.sidebar')
<!--====== End Left Sidebar Section======-->


<!--====== Start Main Wrapper Section======-->
<section class="d-flex" id="wrapper">
  


    <div class="page-content-wrapper">
       <!--  Header BreadCrumb -->
        <div class="content-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="material-icons">home</i>Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('commentaire.index') }}">Commentaires</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $commentaire->user->prenom }} {{ $commentaire->user->nom }}</li>
              </ol>
            </nav>
            <div class="create-item">
                <a href="{{ route('commentaire.edit', $commentaire) }}" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>Modifier le commentaire</a>
                <a href="{{ route('commentaire.index') }}" class="btn btn-secondary"><i class="material-icons md-18">arrow_back</i>Retour à la liste des signalements</a>
            </div>
        </div>
          <!--  Header BreadCrumb -->   
          <!-- Create New User -->   
        <div class="main-content">

            <div class="card bg-white">
                <div class="card-body mt-5 mb-5">
                    
                    <div class="viewuser row">
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-md-4">Utilisateur</div>
                                <div class="col-md-8">
                                    {{ $commentaire->user->prenom }} {{ $commentaire->user->nom }}

                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">Publication</div>
                                <div class="col-md-8">
                                    {{ $commentaire->publication?->type }}
                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">Contenu</div>
                                <div class="col-md-8">
                                    {{ $commentaire->contenu }}


                                 </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">Date de création</div>
                                <div class="col-md-8">
                                    {{ $commentaire->created_at }}

                                 </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
         <!-- Create New User-->   


        </div>  
        <!--  main-content -->   
    </div> 

</section>
<!--====== End Main Wrapper Section======-->

    @include('layouts.partials.footer')

</body>
</html>