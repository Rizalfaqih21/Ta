<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('goser.png')}}" alt="logo brand" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("teknisi.home") ? "active" : "" }}" href="{{ route("teknisi.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("teknisi/permissions*") ? "menu-open" : "" }} {{ request()->is("teknisi/roles*") ? "menu-open" : "" }} {{ request()->is("teknisi/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("teknisi/permissions*") ? "active" : "" }} {{ request()->is("teknisi/roles*") ? "active" : "" }} {{ request()->is("teknisi/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("teknisi.permissions.index") }}" class="nav-link {{ request()->is("teknisi/permissions") || request()->is("teknisi/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("teknisi.roles.index") }}" class="nav-link {{ request()->is("teknisi/roles") || request()->is("teknisi/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("teknisi.users.index") }}" class="nav-link {{ request()->is("teknisi/users") || request()->is("teknisi/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('layanan_access')
                    <li class="nav-item">
                        <a href="{{ route("teknisi.layanans.index") }}" class="nav-link {{ request()->is("teknisi/layanans") || request()->is("teknisi/layanans/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-hand-holding">

                            </i>
                            <p>
                                {{ trans('cruds.layanan.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('pemesanan_access')
                    <li class="nav-item">
                        <a href="{{ route("teknisi.pemesanans.index") }}" class="nav-link {{ request()->is("teknisi/pemesanans") || request()->is("teknisi/pemesanans/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cart-plus">

                            </i>
                            <p>
                                {{ trans('cruds.pemesanan.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('teknisi_access')
                    <li class="nav-item">
                        <a href="{{ route("teknisi.teknisis.index") }}" class="nav-link {{ request()->is("teknisi/teknisis") || request()->is("teknisi/teknisis/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-tie">

                            </i>
                            <p>
                                {{ trans('cruds.teknisi.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('riwayat_pemesanan_access')
                    <li class="nav-item">
                        <a href="{{ route("teknisi.riwayat-pemesanans.index") }}" class="nav-link {{ request()->is("teknisi/riwayat-pemesanans") || request()->is("teknisi/riwayat-pemesanans/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-bookmark">

                            </i>
                            <p>
                                {{ trans('cruds.riwayatPemesanan.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('teknisi/profile/password') || request()->is('teknisi/profile/password/*') ? 'active' : '' }}" href="{{ route('teknisi.profile.index') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>