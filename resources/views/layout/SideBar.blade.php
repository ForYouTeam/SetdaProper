<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="#"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
                            srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('pegawai.index') ? 'active' : '' }}">
                    <a href="{{ route('pegawai.index') }}" class='sidebar-link'>
                        <i class="fas fa-user-plus"></i>
                        <span>Pegawai</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('kegiatan.index') ? 'active' : '' }}">
                    <a href="{{ route('kegiatan.index') }}" class='sidebar-link'>
                        <i class="fas fa-calendar-check"></i>
                        <span>Kegiatan</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
