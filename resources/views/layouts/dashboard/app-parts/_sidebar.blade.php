<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">{{ __('dashboard.dashboard') }}</span>
            </a>
        </li>


        @canany(['settings', 'sliders', 'pages'])
            <li
                class="nav-item {{ request()->routeIs('dashboard.settings.*', 'dashboard.sliders.*', 'dashboard.pages.*') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#settings-menu"
                    aria-expanded="{{ request()->routeIs('dashboard.settings.*', 'dashboard.sliders.*', 'dashboard.pages.*') ? 'true' : 'false' }}"
                    aria-controls="settings-menu">
                    <i class="menu-icon mdi mdi-tune-vertical"></i>
                    <span class="menu-title">{!! __('dashboard.settings') !!}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ request()->routeIs('dashboard.settings.*', 'dashboard.sliders.*', 'dashboard.pages.*') ? 'show' : '' }}"
                    id="settings-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('settings')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard.settings.index') ? 'active' : '' }}"
                                    href="{{ route('dashboard.settings.index') }}">{!! __('settings.settings') !!}</a>
                            </li>
                        @endcan
                        @can('sliders')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard.sliders.*') ? 'active' : '' }}"
                                    href="{{ route('dashboard.sliders.index') }}">{!! __('sliders.sliders') !!}</a>
                            </li>
                        @endcan
                        @can('pages')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard.pages.*') ? 'active' : '' }}"
                                    href="{{ route('dashboard.pages.index') }}">{!! __('pages.pages') !!}</a>
                            </li>
                        @endcan

                    </ul>
                </div>
            </li>
        @endcanany

        @can('admins')
            <li class="nav-item {{ request()->routeIs('dashboard.admins.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.admins.index') }}">
                    <i class="menu-icon ti-user"></i>
                    <span class="menu-title">{!! __('admins.admins') !!}</span>
                </a>
            </li>
        @endcan

        @can('roles')
            <li class="nav-item {{ request()->routeIs('dashboard.roles.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.roles.index') }}">
                    <i class="mdi mdi-shield-account menu-icon"></i>
                    <span class="menu-title">{{ __('roles.roles') }}</span>
                </a>
            </li>
        @endcan


        @can('addresses')
            <li class="nav-item {{ request()->routeIs('dashboard.addresses.*') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#addresses-menu"
                    aria-expanded="{{ request()->routeIs('dashboard.addresses.*') ? 'true' : 'false' }}"
                    aria-controls="addresses-menu">
                    <i class="menu-icon mdi mdi-earth"></i>
                    <span class="menu-title">{!! __('dashboard.addresses') !!}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ request()->routeIs('dashboard.addresses.*') ? 'show' : '' }}" id="addresses-menu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.addresses.countries.index') ? 'active' : '' }}"
                                href="{{ route('dashboard.addresses.countries.index') }}">{!! __('addresses.countries') !!}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.addresses.cities.index') ? 'active' : '' }}"
                                href="{{ route('dashboard.addresses.cities.index') }}">{!! __('addresses.cities') !!}</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan


        @can('tickets')
            <li class="nav-item {{ request()->routeIs('dashboard.tickets.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.tickets.index') }}">
                    <i class="mdi mdi-ticket menu-icon"></i>
                    <span class="menu-title">{!! __('tickets.tickets') !!}</span>
                </a>
            </li>
        @endcan

        @can('tours')
            <li class="nav-item {{ request()->routeIs('dashboard.tours.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.tours.index') }}">
                    <i class="mdi mdi-map-marker-path menu-icon"></i>
                    <span class="menu-title">{!! __('tours.tours') !!}</span>
                </a>
            </li>
        @endcan


        @can('categories')
            <li class="nav-item {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}">
                    <i class="mdi mdi-shape-outline menu-icon"></i>
                    <span class="menu-title">{!! __('categories.categories') !!}</span>
                </a>
            </li>
        @endcan

        @can('flights')
            <li class="nav-item {{ request()->routeIs('dashboard.flights.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.flights.index') }}">
                    <i class="mdi mdi-airplane menu-icon"></i>
                    <span class="menu-title">{!! __('flights.flights') !!}</span>
                </a>
            </li>
        @endcan

        @can('reservations')
            <li class="nav-item {{ request()->routeIs('dashboard.reservations.*') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#reservations-menu"
                    aria-expanded="{{ request()->routeIs('dashboard.reservations.*') ? 'true' : 'false' }}"
                    aria-controls="reservations-menu">
                    <i class="mdi mdi-calendar-check menu-icon"></i>
                    <span class="menu-title">{!! __('reservations.reservations') !!}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ request()->routeIs('dashboard.reservations.*') ? 'show' : '' }}"
                    id="reservations-menu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.reservations.index') ? 'active' : '' }}"
                                href="{{ route('dashboard.reservations.index') }}">{!! __('reservations.reservations') !!}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.reservations.show.report') ? 'active' : '' }}"
                                href="{{ route('dashboard.reservations.show.report') }}">{!! __('reservations.reports') !!}</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan



        @can('tasks')
            <li class="nav-item {{ request()->routeIs('dashboard.tasks.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.tasks.index') }}">
                    <i class="mdi mdi-format-list-checks menu-icon"></i>
                    <span class="menu-title">{{ __('dashboard.tasks') }}</span>
                </a>
            </li>
        @endcan

        @can('notifications')
            <li class="nav-item {{ request()->routeIs('dashboard.notifications.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.notifications.index') }}">
                    <i class="mdi mdi-bell-outline menu-icon"></i>
                    <span class="menu-title">{{ __('notifications.notifications') }}</span>
                </a>
            </li>
        @endcan

        @can('mailing')
            <li class="nav-item {{ request()->routeIs('dashboard.mailing.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.mailing.index') }}">
                    <i class="mdi mdi-email-outline menu-icon"></i>
                    <span class="menu-title">{{ __('mailing.mailing') }}</span>
                </a>
            </li>
        @endcan







        {{-- <li class="nav-item nav-category">UI Elements</li>
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
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/data-table.html">Advanced table</a>
                    </li>
                </ul>
            </div>
        </li> --}}


    </ul>
</nav>
