<!-- Custom fonts for this template-->
<link href="../assets/sesil/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../assets/sesil/css/sb-admin-2.min.css" rel="stylesheet">

<!-- Page Wrapper -->
<div id="wrapper">


    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Turkish Course</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <li class="nav-item">
            <a class="nav-link" href="dashboard-siswa">
                <i class='fas fa-home' style='font-size:17px'></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="materi-detail-siswa">
                <i class='fas fa-calendar-alt' style='font-size:17px'></i>
                <span>Materi</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="akses-video-basic-siswa">
                <i class='far fa-play-circle' style='font-size:17px'></i>
                <span>Video</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="tugas-online-siswa">
                <i class='far fa-file-alt' style='font-size:17px'></i>
                <span>Tugas</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @yield('content')
