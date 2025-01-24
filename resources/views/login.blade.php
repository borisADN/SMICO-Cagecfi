@extends('layouts.base')
<link href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" rel="stylesheet">

@section('content')
    <div class="row g-0">
        <div class="col-xxl-3 col-lg-4 col-md-5">
            <div class="d-flex flex-column h-100 py-5 px-4">
                <div class="text-center text-muted mb-2">
                    <div class="pb-3">
                        <a href="index.html">
                            <span class="logo-lg">
                            </span>
                        </a>

                    </div>
                </div>

                <div class="my-auto">
                    <div class="p-3 text-center">
                        <img src="{{ asset('assets/images/personnalisation/_logo.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="text-center text-muted mt-5">
                    <p data-key="t-login8">Changer de langue</p>
                    <div class="dropdown d-inline-block language-switch">
                        <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
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
                </div>

            </div>

            <!-- end auth full page content -->
        </div>
        <!-- end col -->

        <div class="col-xxl-9 col-lg-8 col-md-7">
            <div class="auth-bg bg-light py-md-5 p-4 d-flex">
                <div class="bg-overlay-gradient"></div>
                <div class="row justify-content-center g-0 align-items-center w-100">

                    <div class="col-xl-4 col-lg-8">

                        @if (session('alert') === 'error' && session('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="uil uil-exclamation-octagon me-2"></i>
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="px-3 py-3">
                                    <div class="text-center">

                                        <h5 class="mb-0" data-key="t-login1">Bienvenue!</h5>
                                        <p class="text-muted mt-2" data-key="t-login2">Connectez-vous pour continuer</p>
                                    </div>
                                    <form id="loginForm" class="mt-4 pt-2" action="{{ route('login') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="form-floating form-floating-custom mb-3">

                                            <input type="text" name="username" class="form-control" id="input-username"
                                                placeholder="Enter User Name">
                                            <label for="input-username" data-key="t-login3">Identifiant</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-users-alt"></i>
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                            <input type="password" name="psd" class="form-control" id="password-input"
                                                placeholder="Enter Password">
                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="password-input" data-key="t-login4">Mot de Passe</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-padlock"></i>
                                            </div>
                                        </div>

                                        <div class="form-check form-check-primary font-size-16 py-1">
                                            <input class="form-check-input" type="checkbox" id="remember-check">

                                            <label class="form-check-label font-size-14" for="remember-check"
                                                data-key="t-login6">
                                                Rester connecté
                                            </label>
                                        </div>

                                        <div class="mt-3">
                                            <button id="submitButton" class="btn btn-primary w-100" type="submit"
                                                data-key="t-login7">Se Connecter</button>
                                        </div>


                                        <div class="mt-4 pt-3 text-center">
                                            <a href="auth-resetpassword-basic.html"
                                                class="text-muted text-decoration-underline font-size-14"
                                                data-key="t-login5">Mot de Passe Oublié?</a>
                                            <div class="float-end">
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/libs/alertifyjs/build/alertify.min.js') }}"></script>
    <script>
        const form = document.getElementById("loginForm");
        const submitButton = document.getElementById("submitButton");

        form.addEventListener("submit", function() {
            submitButton.innerHTML = "Chargement...";
            submitButton.disabled = true;
        });
    </script>

    <script>
        const passwordInput = document.getElementById("password-input");
        const passwordAddon = document.getElementById("password-addon");
        const passwordIcon = passwordAddon.querySelector("i");

        passwordAddon.addEventListener("click", function() {
            // Vérifier si le type de l'input est "password"
            if (passwordInput.type === "password") {
                passwordInput.type = "text"; // Afficher le mot de passe
                passwordIcon.classList.remove("mdi-eye-outline"); // Changer l'icône
                passwordIcon.classList.add("mdi-eye-off-outline"); // Icône "cacher"
            } else {
                passwordInput.type = "password"; // Cacher le mot de passe
                passwordIcon.classList.remove("mdi-eye-off-outline"); // Changer l'icône
                passwordIcon.classList.add("mdi-eye-outline"); // Icône "afficher"
            }
        });
    </script>

    
@endsection
