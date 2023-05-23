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


        <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="tugas-online-siswa" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Kelas
  </a>

 


@endsection