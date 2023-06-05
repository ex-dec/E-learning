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
        <a class="nav-link" href="{{ route('student.dashboard') }}">
            <i class='fas fa-home' style='font-size:17px'></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        @if ($schedules->grade->id == '1')
            <a class="nav-link" href="{{ route('student.course.basic.material') }}">
            @elseif ($schedules->grade->id == '2')
                <a class="nav-link" href="{{ route('student.course.intermediate.material') }}">
                @elseif ($schedules->grade->id == '3')
                    <a class="nav-link" href="{{ route('student.course.advance.material') }}">
        @endif
        <i class='fas fa-calendar-alt' style='font-size:17px'></i>
        <span>Materi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        @if ($schedules->grade->id == '1')
            <a class="nav-link" href="{{ route('student.course.basic.video') }}">
            @elseif ($schedules->grade->id == '2')
                <a class="nav-link" href="{{ route('student.course.intermediate.video') }}">
                @elseif ($schedules->grade->id == '3')
                    <a class="nav-link" href="{{ route('student.course.advance.video') }}">
        @endif
            <i class='far fa-play-circle' style='font-size:17px'></i>
            <span>Video</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        @if ($schedules->grade->id == '1')
            <a class="nav-link" href="{{ route('student.course.basic.task') }}">
            @elseif ($schedules->grade->id == '2')
                <a class="nav-link" href="{{ route('student.course.intermediate.task') }}">
                @elseif ($schedules->grade->id == '3')
                    <a class="nav-link" href="{{ route('student.course.advance.task') }}">
        @endif
            <i class='far fa-file-alt' style='font-size:17px'></i>
            <span>Tugas</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    </div>

</ul>
<!-- End of Sidebar -->
