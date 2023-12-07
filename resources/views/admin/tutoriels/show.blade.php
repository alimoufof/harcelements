
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
                <li class="breadcrumb-item"><a href="{{ route('tutoriel.index') }}">tutoriels</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $tutoriel->user->prenom }} {{ $tutoriel->user->nom }}</li>
              </ol>
            </nav>
            <div class="create-item">
                <a href="{{ route('tutoriel.edit', $tutoriel) }}" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>Modifier le tutoriel</a>
                <a href="{{ route('tutoriel.index') }}" class="btn btn-secondary"><i class="material-icons md-18">arrow_back</i>Retour à la liste des tutoriels</a>
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
                                    {{ $tutoriel->user->prenom }} {{ $tutoriel->user->nom }}

                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">Harcelement</div>
                                <div class="col-md-8">
                                    {{ $tutoriel->harcelement->type }}
                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">Titre</div>
                                <div class="col-md-8">
                                    {{ $tutoriel->titre }}
                                 </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4">Link</div>
                                <div class="col-md-8">
                                    {{ $tutoriel->link }}


                                 </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-4">Description</div>
                                <div class="col-md-8">
                                    {{ $tutoriel->description }}

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