@extends('siswa.layouts.navbar')
@section('title', 'Dashboard')
@section('content')
 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

    <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sesilia</span>
            <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg">
        </a>
    </nav>
    <!-- End of Topbar -->


     <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="row">
 
 <div class="col-md-4 col-sm-12 mb-3">
     <div class="card">
         <div class="card-body">
             <div class="card-title   font-weight-bolder text-dark"><h5>Basic</h5></div>
             Eccy Abla

             Senin, 19:00 - 22:00
         </div>

         <div class="card-footer">
         <a href="akses-kelas-basic-siswa" class="btn btn-primary">Akses Kelas</a>
         </div>
     </div>
 </div>

 <div class="col-md-4 col-sm-6 mb-3">
     <div class="card">

         <div class="card-body">
             <div class="card-title font-weight-bolder text-dark"><h4>Intermediate</h4></div>
             Eccy Abla

             Rabu, 19:00 - 22:00
         </div>

         <div class="card-footer">
         <a href="akses-kelas-intermediate-siswa" class="col-md-5 btn btn-primary">Akses Kelas</a>
         </div>
     </div>
 </div>

 <div class="col-md-4 col-sm-6 mb-3">
     <div class="card">

         <div class="card-body">
             <div class="card-title  font-weight-bolder text-dark"><h4>Advance</h4></div>
            Eccy Abla

            Jumat, 19:00 - 22:00
         </div>

         <div class="card-footer">
         <a href="akses-kelas-advance-siswa" class="btn btn-primary">Akses Kelas</a>
         </div>
     </div>
 </div>
@endsection