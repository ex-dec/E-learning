<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Turkish Course</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.dashboard') }}">
            <i class='fas fa-home' style='font-size:17px'></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.material') }}">
            <i class='fas fa-book-open' style='font-size:17px'></i>
            <span>Materi</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.schedule') }}">
            <i class='fas fa-calendar-alt' style='font-size:17px'></i>
            <span>Jadwal</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">

        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="nav-link">
            <i class="fa fa-angle-double-left" style="font-size:17px"></i>
            <span>Keluar</span></a>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    </div>

</ul>
<!-- End of Sidebar -->
