
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
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blogs</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $blog->user->prenom }} {{ $blog->user->nom }}</li>
              </ol>
            </nav>
            <div class="create-item">
                <a href="{{ route('blog.edit', $blog) }}" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>Modifier le blog</a>
                <a href="{{ route('blog.index') }}" class="btn btn-secondary"><i class="material-icons md-18">arrow_back</i>Retour à la liste des blogs</a>
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
                                    {{ $blog->user->prenom }} {{ $blog->user->nom }}

                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">Harcelement</div>
                                <div class="col-md-8">
                                    {{ $blog->harcelement_id }}
                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">Titre</div>
                                <div class="col-md-8">
                                    {{ $blog->titre }}
                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">Description</div>
                                <div class="col-md-8">
                                    {{ $blog->description }}

                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">Contenu</div>
                                <div class="col-md-8">
                                    {{ $blog->contenu }}


                                 </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">Date de création</div>
                                <div class="col-md-8">
                                    {{ $blog->created_at }}

                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="user-thumb">
                                    <img id="profile-photo" src="{{ asset('storage/' . $blog->photo) }}"  alt="">
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