@extends('layouts.master')

@section('title', 'Accueil')

@section('content')
<!--====== Start Main Wrapper Section======-->
<section class="d-flex" id="wrapper">

     <div class="page-content-wrapper">
         <!--  Header BreadCrumb -->
         <div class="content-header">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.html"><i class="material-icons">home</i>Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Library</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Data</li>
                 </ol>
             </nav>
             <!--             <div class="create-item">
                 <a href="" class="btn btn-primary"><i class="material-icons">add</i>Create user</a>
             </div> -->
         </div>
         <!--  Header BreadCrumb -->
         <!--  main-content -->
         <div class="main-content">
 
 
 
             <!-- Dashboard Box -->
             <div class="row animated fadeInUp">
                 <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-info o-hidden h-100">
                         <div class="card-body">
                             <div class="card-body-icon">
                                 <i class="material-icons float-right text-white md-5em">group_add</i>
                             </div>
                             <div class="mr-5">( 123 )New Users</div>
                         </div>
                         <a class="card-footer text-white clearfix small z-1" href="#">
                             <span class="float-left">View Details</span>
                             <span class="float-right">
                                 <i class="material-icons">
                                     keyboard_arrow_right
                                 </i>
                             </span>
                         </a>
                     </div>
                 </div>
                 <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100">
                         <div class="card-body">
                             <div class="card-body-icon">
                                 <i class="material-icons float-right text-white md-5em">supervisor_account</i>
                             </div>
                             <div class="mr-5">( 123 )Active Users</div>
                         </div>
                         <a class="card-footer text-white clearfix small z-1" href="#">
                             <span class="float-left">View Details</span>
                             <span class="float-right">
                                 <i class="material-icons">
                                     keyboard_arrow_right
                                 </i>
                             </span>
                         </a>
                     </div>
                 </div>
                 <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-danger o-hidden h-100">
                         <div class="card-body">
                             <div class="card-body-icon">
                                 <i class="material-icons float-right text-white md-5em">person_outline</i>
                             </div>
                             <div class="mr-5">( 123 )Banned Users</div>
                         </div>
                         <a class="card-footer text-white clearfix small z-1" href="#">
                             <span class="float-left">View Details</span>
                             <span class="float-right">
                                 <i class="material-icons">
                                     keyboard_arrow_right
                                 </i>
                             </span>
                         </a>
                     </div>
                 </div>
                 <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-success o-hidden h-100">
                         <div class="card-body">
                             <div class="card-body-icon">
                                 <i class="material-icons float-right text-white md-5em">people_outline</i>
                             </div>
                             <div class="mr-5">( 123 )Total Users</div>
                         </div>
                         <a class="card-footer text-white clearfix small z-1" href="#">
                             <span class="float-left">View Details</span>
                             <span class="float-right">
                                 <i class="material-icons">
                                     keyboard_arrow_right
                                 </i>
                             </span>
                         </a>
                     </div>
                 </div>
             </div>
             <!-- Dashboard Box -->
 
 
 
 
 
 
 
 
             <div class="row mt-3">
 
 
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-header">Github Users</div>
                         <div class="card-body">
                             <table class="table table-striped">
                                 <tbody>
                                     <tr>
                                         <td><a href="https://www.elmasapp.online/users/248">yash</a></td>
                                         <td width="1" class="nowrap">Date</td>
                                     </tr>
                                     <tr>
                                         <td><a href="https://www.elmasapp.online/users/247">test</a></td>
                                         <td width="1" class="">Date</td>
                                     </tr>
 
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
 
 
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-header">Facebook Users</div>
                         <div class="card-body">
                             <table class="table table-striped">
                                 <tbody>
                                     <tr>
                                         <td><a href="https://www.elmasapp.online/users/248">yash</a></td>
                                         <td width="1" class="nowrap">Date</td>
                                     </tr>
                                     <tr>
                                         <td><a href="https://www.elmasapp.online/users/247">test</a></td>
                                         <td width="1" class="">Date</td>
                                     </tr>
 
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
 
                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-header">Gmail Users</div>
                         <div class="card-body">
                             <table class="table table-striped">
                                 <tbody>
                                     <tr>
                                         <td><a href="https://www.elmasapp.online/users/248">yash</a></td>
                                         <td width="1" class="nowrap">Date</td>
                                     </tr>
                                     <tr>
                                         <td><a href="https://www.elmasapp.online/users/247">test</a></td>
                                         <td width="1" class="">Date</td>
                                     </tr>
 
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
 
 
 
 
             </div>
 
 
             <div class="row mt-3">
 
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-body">
                             <div class="chart-container">
                                 <canvas id="chart-legend-normal"></canvas>
                             </div>
                         </div>
                     </div>
                 </div>
 
 
             </div>
 
 
 
 
 
 
         </div>
         <!--  main-content -->
     </div>
 
 </section>
 
 <!--====== End Main Wrapper Section======-->
@endsection
