<nav class="main-sidebar ps-menu">
    <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div>
    <div class="sidebar-header">
        @role('admin')
            <div class="text">Admin</div>
        @else
            <div class="text">Teacher</div>
        @endrole
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ Route::is('teacher.dashboard') || Route::is('admin.dashboard') ? 'active' : '' }}">
                @role('admin')
                    <a href="{{ route('admin.dashboard')}}" class="link">
                @else
                    <a href="{{ route('teacher.dashboard')}}" class="link">
                @endrole
                        <i class="ti-home"></i>
                        <span>Dasbor</span>
                    </a>
            </li>
            @role('admin')
            <li class="{{ Route::is('admin.teacher.index') ? 'active' : '' }}">
                <a href="{{ route('admin.teacher.index')}}" class="link">
                    <i class="ti-user"></i>
                    <span>Kelola Guru</span>
                </a>
            </li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="link">
                    <i class="ti-power-off"></i>
                    <span>Logout</span>
                </a>
            </li>
            @else
            <li class="{{ Route::is('teacher.material.index') ? 'active' : '' }}">
                <a href="{{ route('teacher.material.index')}}" class="link">
                    <i class="ti-book"></i>
                    <span>Materi</span>
                </a>
            </li>
            <li class="{{ Route::is('teacher.schedule.index') ? 'active' : '' }}">
                <a href="{{ route('teacher.schedule.index')}}" class="link">
                    <i class="ti-notepad"></i>
                    <span>Jadwal</span>
                </a>
            </li>
            <li class="{{ Route::is('teacher.presence.index') ? 'active' : '' }}">
                <a href="{{ route('teacher.presence.index')}}" class="link">
                    <i class="ti-timer"></i>
                    <span>Riwayat Presensi</span>
                </a>
            </li>
            <li class="{{ Route::is('teacher.task.index')? 'active' : '' }}">
                <a href="{{ route('teacher.task.index')}}" class="link">
                    <i class="ti-book"></i>
                    <span>Tugas</span>
                </a>
            </li>
            <li class="{{ Route::is('teacher.score.index')? 'active' : '' }}">
                <a href="{{ route('teacher.score.index')}}" class="link">
                    <i class="ti-cup"></i>
                    <span>Nilai</span>
                </a>
            </li>
            <li class="{{ Route::is('teacher.pass.index')? 'active' : '' }}">
                <a href="{{ route('teacher.pass.index')}}" class="link">
                    <i class="ti-bar-chart"></i>
                    <span>Siswa Lulus</span>
                </a>
            </li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="link">
                    <i class="ti-power-off"></i>
                    <span>Logout</span>
                </a>
            </li>
            @endrole

        </ul>
    </div>
</nav>
