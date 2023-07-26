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
                    <a class="nav-link {{ request()->routeIs("user.home") ? "active" : "" }}" href="{{ route("user.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('pemesanan_access')
                    <li class="nav-item">
                        <a href="{{ route("user.pemesanans.index") }}" class="nav-link {{ request()->is("user.pemesanans") || request()->is("user.pemesanans/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cart-plus">

                            </i>
                            <p>
                                {{ trans('cruds.pemesanan.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('riwayat_pemesanan_access')
                    <li class="nav-item">
                        <a href="{{ route("user.riwayat-pemesanans.index") }}" class="nav-link {{ request()->is("user.riwayat-pemesanans") || request()->is("user.riwayat-pemesanans/*") ? "active" : "" }}">
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
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
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