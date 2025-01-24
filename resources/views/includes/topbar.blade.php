<header id="page-topbar" class="fixed-top">
    <div class="navbar-header">

        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/personnalisation/_logo.png') }}" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/personnalisation/_logo.png') }}" alt=""
                            height="26"> <span class="logo-txt"></span>
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/personnalisation/_logo.png') }}" alt=""
                            height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/personnalisation/_logo.png') }}" alt=""
                            height="26"> <span class="logo-txt"></span>
                    </span>
                </a>
            </div>

            {{-- Bouton hamburger pour petits écrans! --}}
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse"
                id="horimenu-btn" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" href="" id="topnav-dashboard"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-home-circle icon"></i>
                                    <span data-key="t-dashboard">Accueil</span>
                                </a>
                            </li>
                            @if (!empty($groupedOptions))
                                @foreach ($groupedOptions as $libMenu => $menuOptions)
                                    <li class="nav-item dropdown">
                                        <!-- Affichage du dataKey du menu principal -->
                                        <a class="nav-link dropdown-toggle arrow-none" href="#"
                                            id="topnav-{{ strtolower($libMenu) }}" role="button">
                                            <span data-key="{{ $menuOptions[0]['head'] }}"></span>
                                            <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-{{ strtolower($libMenu) }}">
                                            {{-- <div class="menu-title">{{ ($menuOptions[0]['head']) }}</div> --}}

                                            @foreach ($menuOptions as $option)
                                                <!-- Affichage de chaque sous-menu avec un dataKey spécifique -->
                                                <a href="{{ $option['urlParam'] }}" class="dropdown-item"
                                                    data-key="{{ $option['dataKey'] }}">
                                                    {{ __($option['libOption']) }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>

        </div>

        <div class="d-flex">


            <div class="dropdown d-inline-block language-switch">
                <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img id="header-lang-img" src="https://flagcdn.com/w20/fr.png"
                        srcset="https://flagcdn.com/w40/fr.png 2x" width="20" alt="France">
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="fr">
                        <img src="https://flagcdn.com/w20/fr.png" srcset="https://flagcdn.com/w40/fr.png 2x"
                            width="20" alt="France" class="me-2" height="12">
                        <span class="align-middle">Français</span>
                    </a>
                    <!-- item-->
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                        <img src="https://flagcdn.com/w20/us.png" srcset="https://flagcdn.com/w40/us.png 2x"
                            width="20" alt="United States" class="me-2" height="12">
                        <span class="align-middle">English</span>
                    </a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('assets/images/personnalisation/avatar.png') }}" alt="Header Avatar">
                    <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                        {{-- <span class="user-name">Boris W. <i class="mdi mdi-chevron-down"></i></span> --}}
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header">Welcome {{ $completeName }}</h6>

                    @foreach ($userSpace as $option)
                        <a class="dropdown-item" href="{{ url($option['urlParam']) }}">
                            <span class="align-middle" data-key="{{ $option['dataKey'] }}">
                                {{ __($option['libOption']) }}
                            </span>
                        </a>
                    @endforeach

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Deconnexion</span></a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="hori-overlay"></div>
<br><br><br><br><br>
