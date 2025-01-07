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
                        <h4 class="card-title text-center fw-bold">TRANSFERT ENTRE MES COMPTES</h4>
                    </div>
                    <div class="card-body p-4 mb-4">
                        <form id="myForm" action="{{ route('accountTransfert') }}" method="POST">
                            @csrf
                            <ul class="wizard-nav">
                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Seller Details">
                                            1
                                            <i class="uil uil-list-ul"></i>
                                        </div>
                                    </div>
                                </li>

                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Company Document">
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
                                            <select name="idcptemet" id="compte-select" class="form-control compte-select">
                                                @foreach ($comptes as $compte)
                                                    <option value="{{ $compte['idcompte'] }}">{{ $compte['nomcompte'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">SOLDE</label>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" readonly class="form-control w-25" id="balance">
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
                                                    id="basicpill-pancard-input">
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">FRAIS</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" readonly class="form-control w-25"
                                                        id="basicpill-lastname-input">
                                                    <button class="btn btn-primary"><i
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
                                            <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                            <select name="idcptrecept" id="compte-select2"
                                                class="form-control compte-select2">

                                                @foreach ($comptes as $compte)
                                                    <option value="{{ $compte['idcompte'] }}">{{ $compte['nomcompte'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">SOLDE</label>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" readonly class="form-control w-25" id="balance2">
                                                <button class="btn btn-primary" id="trigger-api-btn2"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>


                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-card-verification-input"
                                                class="form-label">DESCRIPTION</label>
                                            <textarea class="form-control" name="" id="" cols="10" rows="4"></textarea>
                                        </div>

                                        <a id="submit-btn" class="btn btn-primary w-sm">Soumettre</a>

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

        <script>
            document.getElementById("submit-btn").addEventListener("click", function() {
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

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            icon: "info",
                            title: "Operation annulée",
                            confirmButtonColor: "#776acf",
                        });
                    }
                });
            });
        </script>

{{-- Script pour verifier le solde du compte emetteur --}}
        <script>
            // Exécute le script une fois que le document HTML est complètement chargé
            $(document).ready(function() {
                // Ajoute un événement "click" au bouton avec l'ID "trigger-api-btn"
                $('#trigger-api-btn').on('click', function() {
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

                    const requestData = {
                        codeapi: "pmobile",
                        methode: "wsoldecompte",
                        refsession: refsession,
                        idcompte: idcompte,
                        montantcommission: 0,
                        datesolde: datesolde
                    };
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
        
{{-- Script pour verifier le solde du compte recepteur --}}
        <script>
            // Exécute le script une fois que le document HTML est complètement chargé
            $(document).ready(function() {
                // Ajoute un événement "click" au bouton avec l'ID "trigger-api-btn"
                $('#trigger-api-btn2').on('click', function() {
                    // Désactive le bouton pour éviter les clics multiples pendant la requête
                    const button = $(this);
                    button.prop('disabled', true).html(
                        '<i class="bx bx-loader-alt bx-spin"></i>'); // Affiche une icône de chargement

                    const idcompte = $('#compte-select2').val();


                    const refsession = "{{ session('referencereponse') }}"
                    if (!refsession) {
                        alert('La session est manquante !');
                        button.prop('disabled', false).html('<i class="bx bx-refresh fw-bold"></i>');
                        return;
                    }
                    const now = new Date();
                    const datesolde =
                        `${now.getFullYear()}${String(now.getMonth() + 1).padStart(2, '0')}${String(now.getDate()).padStart(2, '0')}${String(now.getHours()).padStart(2, '0')}${String(now.getMinutes()).padStart(2, '0')}${String(now.getSeconds()).padStart(2, '0')}${String(now.getMilliseconds()).padStart(3, '0')}`;

                    const requestData = {
                        codeapi: "pmobile",
                        methode: "wsoldecompte",
                        refsession: refsession,
                        idcompte: idcompte,
                        montantcommission: 0,
                        datesolde: datesolde
                    };
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
                                $('#balance2').val(response.solde);
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
                            $('#trigger-api-btn2').prop('disabled', false);
                            $('#trigger-api-btn2').html('<i class="bx bx-refresh fw-bold"></i>');
                        }

                    });
                });
            });
        </script>

<script src="{{ asset('assets/libs/alertifyjs/build/alertify.min.js') }}"></script>
<script>
    // Vérifie si une alerte error a été définie par Laravel
    @if(session('alert') === 'error' && session('message'))
        let message = "{{ session('message') }}"; 
        alertify.error(message);
    @endif

    @if(session('alert') ==='success' && session('message'))
        let message = "{{ session('message') }}"; 
        alertify.success(message);
    @endif
</script>

        @include('includes.footer')
    </div>
@endsection
