<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard.index') }}"><img style="height: 50px;"
                            src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
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
                    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @hasrole('super-admin')
                    <li class="sidebar-item {{ request()->routeIs('pegawai.getAll') ? 'active' : '' }}">
                        <a href="{{ route('pegawai.getAll') }}" class='sidebar-link'>
                            <i class="fas fa-user-plus"></i>
                            <span>Pegawai</span>
                        </a>
                    </li>
                @endhasrole

                <li class="sidebar-item {{ request()->routeIs('kegiatan.getAll') ? 'active' : '' }}">
                    <a href="{{ route('kegiatan.getAll') }}" class='sidebar-link'>
                        <i class="fas fa-calendar-check"></i>
                        <span>Kegiatan</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
