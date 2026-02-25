<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">{{ __('dashboard.dashboard') }}</span>
            </a>
        </li>

        @can('admins')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.admins.index') }}">
                    <i class="menu-icon ti-user"></i>
                    <span class="menu-title">{!! __('admins.admins') !!}</span>
                </a>
            </li>
        @endcan

        @can('roles')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.roles.index') }}">
                    <i class="mdi mdi-shield-account menu-icon"></i>
                    <span class="menu-title">{{ __('roles.roles') }}</span>
                </a>
            </li>
        @endcan


        @can('addresses')
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#addresses-menu" aria-expanded="false"
                    aria-controls="addresses-menu">
                    <i class="menu-icon mdi mdi-earth"></i>
                    <span class="menu-title">{!! __('dashboard.addresses') !!}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="addresses-menu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('dashboard.addresses.countries.index') }}">{!! __('addresses.countries') !!}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('dashboard.addresses.cities.index') }}">{!! __('addresses.cities') !!}</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan


        @can('tasks')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.tasks.index') }}">
                    <i class="mdi mdi-format-list-checks menu-icon"></i>
                    <span class="menu-title">{{ __('dashboard.tasks') }}</span>
                </a>
            </li>
        @endcan


        @can('settings')
            <li class="nav-item nav-category">{!! __('dashboard.settings') !!}</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.settings.index') }}">
                    <i class="menu-icon mdi mdi-settings"></i>
                    <span class="menu-title">{!! __('settings.settings') !!}</span>
                </a>
            </li>
        @endcan



        <li class="nav-item nav-category">UI Elements</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/tabs.html">Tabs</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/modals.html">Modals</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/carousel.html">Carousel</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/data-table.html">Advanced table</a>
                    </li>
                </ul>
            </div>
        </li>


    </ul>
</nav>
