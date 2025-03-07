<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.base')

@section('content')
    @include('includes.topbar')
    @include('includes.spinner')
    <div class="main-content mb-5">

        <div class="row custom-card  ">
            <div class="col-lg-12 ">
                <div id="alert-placeholder">
                    @if (session('alert') === 'error' && session('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="uil uil-exclamation-octagon me-2"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">VIREMENT VERS AUTRES COMPTES {{ env('SOCIETY_NAME') }}
                        </h4>
                    </div>
                    <div class="card-body p-4 mb-4">
                        <form id="myForm" action="{{ route('virementProcess') }}" method="POST">
                            @csrf
                            <ul class="wizard-nav">
                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="">
                                            1
                                            <i class="uil uil-list-ul"></i>
                                        </div>
                                    </div>
                                </li>

                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                           >
                                            2
                                            <i class="uil uil-clipboard-notes"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div class="wizard-tab">
                                <div class="text-center">
                                    <h5>DE</h5>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">
                                        <div class="mb-1">
                                            <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                            <select name="idcptemet" id="compte-select" class="form-control">
                                                @foreach ($comptes as $compte)
                                                    <option value="{{ $compte['idcompte'] }}">{{ $compte['nomcompte'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">SOLDE</label>
                                            <div class="d-flex align-items-center flex-direction-row gap-3">
                                                <input type="text" class="form-control w-25" id="balance">
                                                <button class="btn btn-primary" id="trigger-api-btn"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>


                                        <div>
                                            <div class="text-center mb-4">
                                                <h5>Details Monetaires de L'operation</h5>
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-pancard-input" class="form-label">MONTANT</label>
                                                <input name="montantope" type="text" class="form-control"
                                                    id="montantope">
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">FRAIS</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" class="form-control w-25" id="commission_screen"
                                                        readonly>
                                                    <button class="btn btn-primary" id="trigger-api-btn2"><i
                                                            class="bx bx-refresh fw-bold"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="wizard-tab">
                                <div class="text-center">
                                    <h5>VERS</h5>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">ID Mobile</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control w-50" id="id_mobile"
                                                    name="id_mobile">
                                                <button class="btn btn-primary" id="trigger-api-btn3"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">Code Client</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control w-50" id="code_client">
                                                <button class="btn btn-primary" id="trigger-api-btn4"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">Titulaire</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control " id="titulaire" readonly>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                            <select name="idcptrecept" id="compte-select2" class="form-control">
                                            </select>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-card-verification-input"
                                                class="form-label">DESCRIPTION</label>
                                            <textarea class="form-control" name="" id="" cols="10" rows="4"></textarea>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <button type="button" class="btn btn-primary w-sm" id="prevBtn"
                                    onclick="nextPrev(-1)">Precedent</button>
                                <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn"
                                    onclick="nextPrev(1)">Suivant</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
        <script src="{{ asset('assets/libs/alertifyjs/build/alertify.min.js') }}"></script>
        <script src="{{ asset('assets/libs/showAlert/showAlert.js') }}"></script>
        {{-- affichage de la boite de saisie du code PIN et soumission --}}
        <script>
            function handleFinish() {
                Swal.fire({
                    title: "Entrez votre code PIN",
                    input: "password",
                    inputAttributes: {
                        maxlength: 4,
                        autocapitalize: "off",
                        autocorrect: "off",
                        placeholder: "Code PIN",
                    },
                    inputLabel: "PIN",
                    showCancelButton: true,
                    confirmButtonText: "Valider",
                    cancelButtonText: "Annuler",
                    confirmButtonColor: "#776acf",
                    cancelButtonColor: "#f34e4e",
                    preConfirm: (pin) => {
                        if (!pin || pin.length !== 4) {
                            Swal.showValidationMessage("Veuillez entrer un PIN à 4 chiffres.");
                        } else {
                            return pin; // Renvoie le PIN pour une utilisation ultérieure
                        }
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById("myForm");
                        const hiddenPinField = document.createElement("input");
                        hiddenPinField.type = "hidden";
                        hiddenPinField.name = "codepinemet"; // Le nom que tu veux donner
                        hiddenPinField.value = result.value;
                        form.appendChild(hiddenPinField);

                        form.submit();
                        showSpinner('Veuillez patienter...');
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            icon: "info",
                            title: "Opération annulée",
                            confirmButtonColor: "#776acf",
                        });
                    }
                });
            }

            function showSuccessAlert() {
                Swal.fire({
                    title: "Succès!",
                    text: "L'operation a été effectuée avec succes.",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            }
        </script>

        {{-- Script pour verifier le solde du compte emetteur --}}
        <script>
            // Exécute le script une fois que le document HTML est complètement chargé
            $(document).ready(function() {
                // Ajoute un événement "click" au bouton avec l'ID "trigger-api-btn"
                $('#trigger-api-btn').on('click', function() {
                    showSpinner('Veuillez patienter...');
                    // Désactive le bouton pour éviter les clics multiples pendant la requête
                    const button = $(this);
                    button.prop('disabled', true).html(
                        '<i class="bx bx-loader-alt bx-spin"></i>'); // Affiche une icône de chargement

                    const idcompte = $('#compte-select').val();


                    const refsession = "{{ session('referencereponse') }}"
                    if (!refsession) {
                        alert('La session est manquante !');
                        button.prop('disabled', false).html('<i class="bx bx-refresh fw-bold"></i>');
                        return;
                    }
                    const now = new Date();
                    const datesolde =
                        `${now.getFullYear()}${String(now.getMonth() + 1).padStart(2, '0')}${String(now.getDate()).padStart(2, '0')}${String(now.getHours()).padStart(2, '0')}${String(now.getMinutes()).padStart(2, '0')}${String(now.getSeconds()).padStart(2, '0')}${String(now.getMilliseconds()).padStart(3, '0')}`;

                    // Envoie une requête AJAX au backend Laravel
                    $.ajax({
                        url: "/checkBalance", // Appel au backend Laravel
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            codeapi: "pmobile",
                            methode: "wsoldecompte",
                            refsession: "{{ session('refsession') }}",
                            idcompte: $('#compte-select').val(),
                            montantcommission: $('#montantcommission').val() || 0,
                            datesolde: 20241126155352098
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response.solde) {
                                $('#balance').val(response.solde);
                                if (response.solde == 0) {
                                    showAlert("Solde insuffisant sur le compte.");

                                    alertify.error('Solde insuffisant sur le compte.');
                                }
                            } else {
                                showAlert("Erreur dans la réponse.");
                                // alertify.error('Erreur dans la réponse.');
                            }
                        },
                        error: function(xhr, status, error) {
                            showAlert("Erreur inattendue!");

                            // alertify.error('Erreur ');
                            console.error(xhr.responseText);
                            // alert("Erreur : " + (xhr.responseJSON?.error || error));
                        },
                        complete: function() {
                            // Réinitialiser le bouton
                            hideSpinner();
                            $('#trigger-api-btn').prop('disabled', false);
                            $('#trigger-api-btn').html('<i class="bx bx-refresh fw-bold"></i>');
                        }

                    });
                });
            });
        </script>

        {{-- Script pour afficher la commission liée au virement --}}
        <script>
            $(document).ready(function() {
                // Gestion de l'événement "click" pour le bouton d'API
                $('#trigger-api-btn2').on('click', function() {
                    const montantope = $('#montantope').val();
                    if (!montantope) {
                        // showAlert("Veuillez entrer une valeur pour le montant de l'opération.");
                        alertify.error('Veuillez entrer une valeur pour le montant de l\'opération.');
                        // alert('Veuillez entrer une valeur pour le montant d\'opération.');
                        setLoadingState(false);
                        // hideSpinner();
                        // return;
                    } else {
                        showSpinner();
                        const button = $(this);

                        // Désactiver le bouton et afficher l'icône de chargement
                        const setLoadingState = (isLoading) => {
                            button.prop('disabled', isLoading).html(
                                isLoading ? '<i class="bx bx-loader-alt bx-spin"></i>' :
                                '<i class="bx bx-refresh fw-bold"></i>'
                            );
                        };

                        setLoadingState(true);

                        // Récupération de la session et validation de sa présence
                        const refsession = "{{ session('referencereponse') }}";
                        if (!refsession) {
                            alert('La session est manquante !');
                            setLoadingState(false);
                            return;
                        }

                        // Validation du champ "montantope"


                        // Préparation des données pour la requête AJAX
                        const requestData = {
                            idcompte: $('#compte-select').val(),
                            montantope: montantope,
                        };

                        // Envoi de la requête AJAX
                        $.ajax({
                            url: "/commissionViremt", // URL de l'endpoint Laravel
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            data: requestData,
                            success: function(response) {
                                // Vérification et affichage de la commission reçue
                                if (response.commission) {
                                    console.log(response);
                                    
                                    $('#commission_screen').val(response.commission);
                                } else {
                                    console.log(response);
                                    showAlert(
                                        'Une erreur est survenue lors de la récupération de la commission!'
                                    );
                                    // alertify.error(
                                    //     'Une erreur est survenue lors de la récupération de la commission !'
                                    // );
                                    // alert("Erreur dans la réponse.");
                                }
                            },
                            error: function(xhr) {

                                showAlert("Erreur inattendue!");
                                // alertify.error(
                                //     'Une erreur est survenue lors de la récupération de la commission !'
                                // );
                                // console.error(xhr.responseText);
                                // alert("Une erreur est survenue lors de la requête.");
                            },
                            complete: function() {
                                hideSpinner();
                                // Réinitialisation de l'état du bouton
                                setLoadingState(false);
                            },
                        });
                    }
                });
            });
        </script>

        {{-- Script pour afficher le solde du compte recepteur a partir du id mobile --}}

        <script>
            $(document).ready(function() {
                // Gestion de l'événement "click" pour le bouton d'API
                $('#trigger-api-btn3').on('click', function() {
                    showSpinner();
                    const button = $(this);
                    // Désactiver le bouton et afficher l'icône de chargement
                    const setLoadingState = (isLoading) => {
                        button.prop('disabled', isLoading).html(
                            isLoading ? '<i class="bx bx-loader-alt bx-spin"></i>' :
                            '<i class="bx bx-refresh fw-bold"></i>'
                        );
                    };

                    setLoadingState(true);

                    // Récupération de la session et validation de sa présence
                    const refsession = "{{ session('referencereponse') }}";
                    if (!refsession) {
                        alert('La session est manquante !');
                        setLoadingState(false);
                        return;
                    }

                    // Préparation des données pour la requête AJAX
                    const requestData = {
                        id_mobile: $('#id_mobile').val(),
                        codeclient: $('#code_client').val(),
                    };
                    // const  = $('#montantope').val();
                    if (!requestData.id_mobile) {
                        // showAlert("Veuillez renseigner le compte recepteur.");
                        alertify.error('Veuillez renseigner le compte recepteur.');
                        // alert('Veuillez entrer une valeur pour le montant d\'opération.');
                        setLoadingState(false);
                        return;
                    }

                    // Envoi de la requête AJAX
                    $.ajax({
                        url: "getReceiverInfo_virement", // URL de l'endpoint Laravel
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: requestData,
                        success: function(response) {
                            // Vérification et affichage de la commission reçue
                            // console.log(response);

                            if (response.apiResponse) {
                                const id_mobile = response.apiResponse.ididentite;
                                const codeclient = response.apiResponse.codebanque;
                                const complete_name = response.apiResponse.nomclient + " " +
                                    response.apiResponse.prenomsclient;
                                const comptes = response.apiResponse.comptesclient;

                                // $('#id_mobile').val(id_mobile);
                                $('#code_client').val(codeclient);
                                $('#titulaire').val(complete_name);

                                if (comptes && comptes.length > 0) {
                                    let comptesOptions = '';
                                    comptes.forEach(compte => {
                                        comptesOptions += `
                                     <option value="${compte.idcompte}">
                                              ${compte.nomcompte}
                                                     </option>`;
                                    });
                                    $('#compte-select2').html(comptesOptions);
                                }
                                // console.log(comptes);


                                // $('#commission_screen').val(response.commission);
                            } else {
                                showAlert(
                                    'Une erreur est survenue lors de la récupération de la commission!'
                                );
                                // alertify.error(
                                //     'Une erreur est survenue lors de la récupération de la commission !'
                                // );
                                // alert("Erreur dans la réponse.");
                                console.log(response);

                            }
                        },
                        error: function(xhr) {
                            showAlert("Erreur inattendue!");
                            // alertify.error('Une erreur est survenue lors de la récupération de la commission !');
                            console.error(xhr.responseText);
                            // alert("Une erreur est survenue lors de la requête.");
                        },
                        complete: function() {
                            hideSpinner();
                            // Réinitialisation de l'état du bouton
                            setLoadingState(false);

                        },
                    });
                });
            });
        </script>

        {{-- Script pour afficher le solde du compte recepteur a partir du code client --}}

        <script>
            $(document).ready(function() {
                // Gestion de l'événement "click" pour le bouton d'API
                $('#trigger-api-btn4').on('click', function() {
                    showSpinner();
                    const button = $(this);

                    // Désactiver le bouton et afficher l'icône de chargement
                    const setLoadingState = (isLoading) => {
                        button.prop('disabled', isLoading).html(
                            isLoading ? '<i class="bx bx-loader-alt bx-spin"></i>' :
                            '<i class="bx bx-refresh fw-bold"></i>'
                        );
                    };

                    setLoadingState(true);

                    // Récupération de la session et validation de sa présence
                    const refsession = "{{ session('referencereponse') }}";
                    if (!refsession) {
                        alert('La session est manquante !');
                        setLoadingState(false);
                        return;
                    }

                    // Préparation des données pour la requête AJAX
                    const requestData = {
                        id_mobile: $('#id_mobile').val(),
                        codeclient: $('#code_client').val(),
                    };
                    // const  = $('#montantope').val();
                    if (!requestData.codeclient) {
                        alertify.error('Veuillez renseigner le compte recepteur.');
                        // alert('Veuillez entrer une valeur pour le montant d\'opération.');
                        setLoadingState(false);
                        return;
                    }

                    // Envoi de la requête AJAX
                    $.ajax({
                        url: "getReceiverInfo_virement", // URL de l'endpoint Laravel
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: requestData,
                        success: function(response) {
                            // Vérification et affichage de la commission reçue
                            // console.log(response);

                            if (response.apiResponse) {
                                const id_mobile = response.apiResponse.ididentite;
                                const codeclient = response.apiResponse.codebanque;
                                const complete_name = response.apiResponse.nomclient + " " +
                                    response.apiResponse.prenomsclient;
                                const comptes = response.apiResponse.comptesclient;

                                $('#id_mobile').val(id_mobile);
                                // $('#code_client').val(codeclient);
                                $('#titulaire').val(complete_name);

                                if (comptes && comptes.length > 0) {
                                    let comptesOptions = '';
                                    comptes.forEach(compte => {
                                        comptesOptions += `
                                     <option value="${compte.idcompte}">
                                              ${compte.nomcompte}
                                                     </option>`;
                                    });
                                    $('#compte-select2').html(comptesOptions);
                                }

                            } else {
                                alertify.error(
                                    'Une erreur est survenue lors de la récupération de la commission !'
                                );
                                alert("Erreur dans la réponse.");
                                console.log(response);

                            }
                        },
                        error: function(xhr) {
                            alertify.error('Erreur inattendue!');
                            // console.error(xhr.responseText);
                            // alert("Une erreur est survenue lors de la requête.");
                        },
                        complete: function() {
                            hideSpinner();
                            // Réinitialisation de l'état du bouton
                            setLoadingState(false);
                        },
                    });
                });
            });
        </script>
        <script>
            // @if (session('alert') === 'error' && session('message'))
            // let message = "{{ session('message') }}"; 
            // alertify.error(message);
            // @endif

            // @if (session('alert') === 'success' && session('message'))
            // let message = "{{ session('message') }}"; 
            // alertify.success(message);
            // @endif
        </script>
        @include('includes.footer')
    </div>
    @if (session('alert') === 'success' && session('message'))
    <script>
        setTimeout(function() {
            showSuccessAlert();
        }, 1000);
    </script>
@endif
@endsection
