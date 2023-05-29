<header class="header-navbar fixed">
    <div class="toggle-mobile action-toggle"><i class="fas fa-bars"></i></div>
    <div class="header-wrapper">
        <div class="header-content">
            <div class="dropdown dropdown-menu-end">
                <a href="#" class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="label">
                        <span></span>
                        <div>{{ auth()->user()->name }}</div>
                    </div>
                    <img class="img-user" src="/assets/images/avatar1.png" alt="user"srcset="">
                </a>
            </div>
        </div>
    </div>
</header>
