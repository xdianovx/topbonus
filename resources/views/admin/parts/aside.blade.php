<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">

        <!-- Light Logo-->
        <a href="{{ route('admin.index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/admin/images/logo-sm.png') }}" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/admin/images/logo-light.png') }}" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="las la-tachometer-alt"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics">
                                    Analytics </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $pages_routes)) active @endif"
                        href="{{ route('admin.pages.index') }}" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-book-open-page-variant"></i> <span data-key="t-layouts">Pages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @if (in_array(Route::current()->getName(), $casinos_routes)) active @endif"
                        href="{{ route('admin.casinos.index') }}" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-slot-machine-outline"></i> <span data-key="t-layouts">Casinos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $categories_routes)) active @endif"
                        href="{{ route('admin.categories.index') }}" aria-expanded="false"
                        aria-controls="sidebarLayouts">
                        <i class="mdi mdi-border-all"></i> <span data-key="t-layouts">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $softs_routes)) active @endif"
                        href="{{ route('admin.softs.index') }}" aria-expanded="false"
                        aria-controls="sidebarLayouts">
                        <i class="mdi mdi-feather"></i> <span data-key="t-layouts">Softs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @if (in_array(Route::current()->getName(), $bonus_types_routes)
                        || in_array(Route::current()->getName(), $bonus_cards_routes)) 
                            active @endif" href="#sidebarBonusCard" data-bs-toggle="collapse" role="button"
                        aria-expanded="@if (in_array(Route::current()->getName(), $bonus_types_routes)
                        || in_array(Route::current()->getName(), $bonus_cards_routes)) 
                        true @else false @endif" aria-controls="sidebarBonusCard">
                        <i class="mdi mdi-gift"></i> <span data-key="t-dashboards">Bonuses</span>
                    </a>
                    <div class="collapse menu-dropdown @if (in_array(Route::current()->getName(), $bonus_types_routes)
                        || in_array(Route::current()->getName(), $bonus_cards_routes)) show @endif" id="sidebarBonusCard">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.bonus_types.index') }}"
                                     class="nav-link @if (in_array(Route::current()->getName(), $bonus_types_routes)) active @endif" data-key="t-analytics">
                                    Bonus Type</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link  @if (in_array(Route::current()->getName(), $bonus_cards_routes)) active @endif"
                                    href="{{ route('admin.bonus_cards.index') }}" aria-expanded="false"
                                    aria-controls="sidebarLayouts">
                                     <span data-key="t-layouts">Bonus Cards</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @if (in_array(Route::current()->getName(), $game_types_routes)
                        || in_array(Route::current()->getName(), $games_routes)) 
                            active @endif" href="#sidebarGames" data-bs-toggle="collapse" role="button"
                        aria-expanded="@if (in_array(Route::current()->getName(), $game_types_routes)
                        || in_array(Route::current()->getName(), $games_routes)) 
                        true @else false @endif" aria-controls="sidebarGames">
                        <i class="ri-gamepad-line"></i> <span data-key="t-dashboards">Games</span>
                    </a>
                    <div class="collapse menu-dropdown @if (in_array(Route::current()->getName(), $game_types_routes)
                        || in_array(Route::current()->getName(), $games_routes)) show @endif" id="sidebarGames">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.game_types.index') }}" 
                                class="nav-link   @if (in_array(Route::current()->getName(), $game_types_routes)) active @endif" data-key="t-analytics">
                                    Game Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.games.index') }}"
                                 class="nav-link  @if (in_array(Route::current()->getName(), $games_routes)) active @endif" data-key="t-analytics">
                                    Games</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link 
                    @if (in_array(Route::current()->getName(), $certificates_routes)
                    || in_array(Route::current()->getName(), $licenses_routes)) 
                        active @endif" href="#sidebarCertificates&Licenses" data-bs-toggle="collapse" role="button"
                        aria-expanded="@if (in_array(Route::current()->getName(), $certificates_routes)
                        || in_array(Route::current()->getName(), $licenses_routes)) 
                        true @else false @endif" 
                        aria-controls="sidebarCertificates&Licenses">
                        <i class="mdi mdi-certificate-outline"></i> <span data-key="t-dashboards">Certificates & Licenses</span>
                    </a>
                    <div class="collapse menu-dropdown @if (in_array(Route::current()->getName(), $certificates_routes)
                    || in_array(Route::current()->getName(), $licenses_routes)) show @endif" id="sidebarCertificates&Licenses">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link  @if (in_array(Route::current()->getName(),$certificates_routes)) active @endif"
                                    href="{{ route('admin.certificates.index') }}" aria-expanded="false"
                                    aria-controls="sidebarLayouts">
                                     <span data-key="t-layouts">Certificates</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if (in_array(Route::current()->getName(), $licenses_routes)) active @endif"
                                    href="{{ route('admin.licenses.index') }}" aria-expanded="false"
                                    aria-controls="sidebarLayouts">
                                     <span data-key="t-layouts">Licenses</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false"
                        aria-controls="sidebarLayouts">
                        <i class="mdi mdi-chart-line"></i> <span data-key="t-layouts">SEO</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
