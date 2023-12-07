
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
<div class="page-content-wrapper">
    <!--  Header BreadCrumb -->
     <div class="content-header">
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="material-icons">home</i>Home</a></li>
             
             <li class="breadcrumb-item active" aria-current="page">Tutoriels</li>
           </ol>
         </nav>
         <div class="create-item">
             <a href="{{ route('tutoriel.create') }}" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>Ajouter un tutoriel</a>
             <a href="" name='export' class=" btn btn-secondary"><i class="material-icons">add</i>Export Execel</a>
         </div>
     </div>
       <!--  Header BreadCrumb --> 
        <!--  main-content -->   
    <div class="main-content">
    <!-- Users DataTable-->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-body mt-3">
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-striped table-borderless" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Harcelement</th>
                                    <th>Titre</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tutoriels as $key => $tutoriel)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tutoriel->user->nom . ' ' . $tutoriel->user->prenom }}</td>
                                        <td>{{ $tutoriel->harcelement->type }}</td>
                                        <td>{{ $tutoriel->titre }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">
                                                <a class="btn btn-sm btn-secondary" href="{{route('tutoriel.show', $tutoriel)}}">Voir</a>  
                                                <a class="btn btn-sm btn-info" href="{{route('tutoriel.edit', $tutoriel)}}">Modifier</a>
                                                <form action="{{route('tutoriel.destroy', $tutoriel)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                                </form> 
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End Main Wrapper Section======-->

    @include('layouts.partials.footer')

</body>
</html>