<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.base')

@section('content')
    @include('includes.topbar')

    <br><br><br><br><br>

    <div class="main-content mb-5">

        <div class="row custom-card  ">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">VIREMENT VERS AUTRES COMPTES {{ env('SOCIETY_NAME') }}
                        </h4>
                    </div>
                    <div class="card-body p-4 mb-4">
                        <form action="#">
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
                                            title="">
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
                                                <input type="text" class="form-control" id="montantope">
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">FRAIS</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" class="form-control w-25"
                                                        id="commission_screen" readonly>
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
                                                <input type="text" class="form-control w-50"
                                                    id="basicpill-lastname-input">
                                                <button class="btn btn-primary"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">Code Client</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control w-50"
                                                    id="basicpill-lastname-input">
                                                <button class="btn btn-primary"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">Titulaire</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control " id="basicpill-lastname-input">

                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">COMPTES SUR LIVRET COLLECTE QUOTIDIENNE de
                                                    KANGNI JULIENNE</option>
                                                    
                                            </select>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-card-verification-input"
                                                class="form-label">DESCRIPTION</label>
                                            <textarea class="form-control" name="" id="" cols="10" rows="4"></textarea>
                                        </div>

                                        {{-- <button type="button" class="btn btn-primary">Annuler</button> --}}

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

        {{-- Script pour verifier le solde du compte emetteur --}}
        <script>
            // Exécute le script une fois que le document HTML est complètement chargé
            $(document).ready(function() {
                // Ajoute un événement "click" au bouton avec l'ID "trigger-api-btn"
                $('#trigger-api-btn').on('click', function() {
                    // Désactive le bouton pour éviter les clics multiples pendant la requête
                    const button = $(this);
                    button.prop('disabled', true).html(
                        '<i class="bx bx-loader-alt bx-spin"></i>'); // Affiche une icône de chargemen
                    const idcompte = $('#compte-select').val();


                    const refsession = "{{ session('referencereponse') }}"
                    if (!refsession) {
                        alert('La session est manquante !');
                        button.prop('disabled', false).html('<i class="bx bx-refresh fw-bold"></i>');
                        return;
                    }
                    const now = new Date();
                    const datesolde = `${now.getFullYear()}${String(now.getMonth() + 1).padStart(2, '0')}${String(now.getDate()).padStart(2, '0')}${String(now.getHours()).padStart(2, '0')}${String(now.getMinutes()).padStart(2, '0')}${String(now.getSeconds()).padStart(2, '0')}${String(now.getMilliseconds()).padStart(3, '0')}`;

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
                            datesolde: datesolde
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response.solde) {
                                $('#balance').val(response.solde);
                            } else {
                                alert("Erreur dans la réponse.");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert("Erreur : " + (xhr.responseJSON?.error || error));
                        },
                        complete: function() {
                            // Réinitialiser le bouton
                            $('#trigger-api-btn').prop('disabled', false);
                            $('#trigger-api-btn').html('<i class="bx bx-refresh fw-bold"></i>');
                        }

                    });
                });
            });
        </script>
<script src="{{ asset('assets/libs/alertifyjs/build/alertify.min.js') }}"></script>
        {{-- Script pour afficher la commission liée au virement --}}
        <script>
            $(document).ready(function () {
                // Gestion de l'événement "click" pour le bouton d'API
                $('#trigger-api-btn2').on('click', function () {
                    const button = $(this);
                    
                    // Désactiver le bouton et afficher l'icône de chargement
                    const setLoadingState = (isLoading) => {
                        button.prop('disabled', isLoading).html(
                            isLoading ? '<i class="bx bx-loader-alt bx-spin"></i>' : '<i class="bx bx-refresh fw-bold"></i>'
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
                    const montantope = $('#montantope').val();
                    if (!montantope) {
                        alertify.error('Veuillez entrer une valeur pour le montant de l\'opération.');
                        // alert('Veuillez entrer une valeur pour le montant d\'opération.');
                        setLoadingState(false);
                        return;
                    }
        
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
                        success: function (response) {
                            // Vérification et affichage de la commission reçue
                            if (response.commission) {
                                $('#commission_screen').val(response.commission);
                            } else {
                                alert("Erreur dans la réponse.");
                            }
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                            alert("Une erreur est survenue lors de la requête.");
                        },
                        complete: function () {
                            // Réinitialisation de l'état du bouton
                            setLoadingState(false);
                        },
                    });
                });
            });
        </script>
        
        @include('includes.footer')
    </div>
@endsection
