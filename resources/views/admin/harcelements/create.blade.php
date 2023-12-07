
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
                <li class="breadcrumb-item"><a href="{{route('harcelement.index')}}">Harcelement</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ajouter un nouveau harcelement</li>
              </ol>
            </nav>
        </div>
          <!--  Header BreadCrumb -->   
          <!-- Create New User -->   
        @include('admin.harcelements._form')
         <!-- Create New User-->   



    </div>  
        <!--  main-content -->    

</section>
<!--====== End Main Wrapper Section======-->

    @include('layouts.partials.footer')

</body>
</html>