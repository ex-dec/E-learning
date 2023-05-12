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
        <div class="text">ADMIN</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard" class="link">
                    <i class="ti-home"></i>
                    <span>Data Aplikasi</span>
                </a>
            </li>
            <li class="{{ Request::is('materis') ? 'active' : '' }}">
                <a href="/materis" class="link">
                    <i class="ti-book"></i>
                    <span>Materi</span>
                </a>
            </li>

            <li>
            <li class="{{ Request::is('jadwal') ? 'active' : '' }}">
                <a href="/jadwal" class="link">
                    <i class="ti-notepad"></i>
                    <span>Jadwal</span>
                </a>
            </li>

            <li>
            <li class="{{ Request::is('tugas') ? 'active' : '' }}">
            <a href="/tugas" class="link">
                    <i class="ti-book"></i>
                    <span>Tugas</span>
                </a>
            </li>
        </ul>
    </div>
</nav>  