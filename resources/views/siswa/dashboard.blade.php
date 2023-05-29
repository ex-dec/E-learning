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
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sesilia</span>
                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                </a>
    </nav>
    <!-- End of Topbar -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-pattern">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa fa-archive text-primary h4 ml-3"></i>
                            </div>
                            <div class="text-xll font-weight-bold text-primary text-uppercase mb-0">
                                Materi</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-pattern">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa fa-th text-primary h4 ml-3"></i>
                            </div>
                            <div class="text-xll font-weight-bold text-primary text-uppercase mb-0">
                                Jadwal</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-pattern">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa fa-file text-primary h4 ml-3"></i>
                            </div>
                            <div class="text-xll font-weight-bold text-primary text-uppercase mb-0">
                                Tugas</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-pattern">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="fa fa-file text-primary h4 ml-3"></i>
                            </div>
                            <div class="text-xll font-weight-bold text-primary text-uppercase mb-0">
                                Sertifikat</div>
                        </div>
                    </div>
                </div>

                <!-- Custom fonts for this template-->
                <link href="../assets/css/bootstrap.dashboard.min.css" rel="stylesheet" type="text/css">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
                    rel="stylesheet">

                <div class="page-content container note-has-grid">
                    <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
                        <li class="nav-item">
                            </a>
                            <div class="tab-content bg-transparent">
                                <div id="note-full-container" class="note-has-grid row">
                                    <div class="col-md-4 single-note-item all-category" style="">
                                        <div class="card card-body">
                                            <span class="side-stick"></span>
                                            <h5 class="note-title text-truncate w-75 mb-0"
                                                data-noteheading="Book a Ticket for Movie">Kelas Basic <i
                                                    class="point fa fa-circle ml-1 font-10"></i></h5>
                                            <p class="note-date font-12 text-muted">Setiap Hari Senin</p>
                                            <div class="note-content">
                                                <p class="note-inner-content text-muted"
                                                    data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                    Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single-note-item all-category note-important" style="">
                                        <div class="card card-body">
                                            <span class="side-stick"></span>
                                            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Go for lunch">
                                                Go for lunch <i class="point fa fa-circle ml-1 font-10"></i></h5>
                                            <p class="note-date font-12 text-muted">01 April 2002</p>
                                            <div class="note-content">
                                                <p class="note-inner-content text-muted"
                                                    data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                    Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="ml-auto">
                                                    <div class="category-selector btn-group">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single-note-item all-category note-social" style="">
                                        <div class="card card-body">
                                            <span class="side-stick"></span>
                                            <h5 class="note-title text-truncate w-75 mb-0"
                                                data-noteheading="Meeting with Mr.Jojo">Meeting with Mr.Jojo <i
                                                    class="point fa fa-circle ml-1 font-10"></i></h5>
                                            <p class="note-date font-12 text-muted">19 October 2020</p>
                                            <div class="note-content">
                                                <p class="note-inner-content text-muted"
                                                    data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                    Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                                                <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                                                <div class="ml-auto">
                                                    <div class="category-selector btn-group">
                                                        <a class="nav-link dropdown-toggle category-dropdown label-group p-0"
                                                            data-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="true" aria-expanded="true">
                                                            <div class="category">
                                                                <div class="category-business"></div>
                                                                <div class="category-social"></div>
                                                                <div class="category-important"></div>
                                                                <span class="more-options text-dark"><i
                                                                        class="icon-options-vertical"></i></span>
                                                            </div>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right category-menu">
                                                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success"
                                                                href="javascript:void(0);">
                                                                <i
                                                                    class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business
                                                            </a>
                                                            <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info"
                                                                href="javascript:void(0);">
                                                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                                                Social
                                                            </a>
                                                            <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger"
                                                                href="javascript:void(0);">
                                                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                                                Important
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single-note-item all-category note-business" style="">
                                        <div class="card card-body">
                                            <span class="side-stick"></span>
                                            <h5 class="note-title text-truncate w-75 mb-0"
                                                data-noteheading="Give Review for design">Give Review for design <i
                                                    class="point fa fa-circle ml-1 font-10"></i></h5>
                                            <p class="note-date font-12 text-muted">02 January 2000</p>
                                            <div class="note-content">
                                                <p class="note-inner-content text-muted"
                                                    data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                    Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                                                <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                                                <div class="ml-auto">
                                                    <div class="category-selector btn-group">
                                                        <a class="nav-link dropdown-toggle category-dropdown label-group p-0"
                                                            data-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="true" aria-expanded="true">
                                                            <div class="category">
                                                                <div class="category-business"></div>
                                                                <div class="category-social"></div>
                                                                <div class="category-important"></div>
                                                                <span class="more-options text-dark"><i
                                                                        class="icon-options-vertical"></i></span>
                                                            </div>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right category-menu">
                                                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success"
                                                                href="javascript:void(0);">
                                                                <i
                                                                    class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business
                                                            </a>
                                                            <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info"
                                                                href="javascript:void(0);">
                                                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                                                Social
                                                            </a>
                                                            <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger"
                                                                href="javascript:void(0);">
                                                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                                                Important
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single-note-item all-category note-social" style="">
                                        <div class="card card-body">
                                            <span class="side-stick"></span>
                                            <h5 class="note-title text-truncate w-75 mb-0"
                                                data-noteheading="Nightout with friends">Nightout with friends <i
                                                    class="point fa fa-circle ml-1 font-10"></i></h5>
                                            <p class="note-date font-12 text-muted">01 August 1999</p>
                                            <div class="note-content">
                                                <p class="note-inner-content text-muted"
                                                    data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                    Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                                                <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                                                <div class="ml-auto">
                                                    <div class="category-selector btn-group">
                                                        <a class="nav-link dropdown-toggle category-dropdown label-group p-0"
                                                            data-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="true" aria-expanded="true">
                                                            <div class="category">
                                                                <div class="category-business"></div>
                                                                <div class="category-social"></div>
                                                                <div class="category-important"></div>
                                                                <span class="more-options text-dark"><i
                                                                        class="icon-options-vertical"></i></span>
                                                            </div>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right category-menu">
                                                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success"
                                                                href="javascript:void(0);">
                                                                <i
                                                                    class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business
                                                            </a>
                                                            <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info"
                                                                href="javascript:void(0);">
                                                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                                                Social
                                                            </a>
                                                            <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger"
                                                                href="javascript:void(0);">
                                                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                                                Important
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single-note-item all-category note-important" style="">
                                        <div class="card card-body">
                                            <span class="side-stick"></span>
                                            <h5 class="note-title text-truncate w-75 mb-0"
                                                data-noteheading="Launch new template">Launch new template <i
                                                    class="point fa fa-circle ml-1 font-10"></i></h5>
                                            <p class="note-date font-12 text-muted">21 January 2015</p>
                                            <div class="note-content">
                                                <p class="note-inner-content text-muted"
                                                    data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                                    Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                                                <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                                                <div class="ml-auto">
                                                    <div class="category-selector btn-group">
                                                        <a class="nav-link dropdown-toggle category-dropdown label-group p-0"
                                                            data-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="true" aria-expanded="true">
                                                            <div class="category">
                                                                <div class="category-business"></div>
                                                                <div class="category-social"></div>
                                                                <div class="category-important"></div>
                                                                <span class="more-options text-dark"><i
                                                                        class="icon-options-vertical"></i></span>
                                                            </div>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right category-menu">
                                                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success"
                                                                href="javascript:void(0);">
                                                                <i
                                                                    class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business
                                                            </a>
                                                            <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info"
                                                                href="javascript:void(0);">
                                                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                                                Social
                                                            </a>
                                                            <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger"
                                                                href="javascript:void(0);">
                                                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                                                                Important
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endsection
