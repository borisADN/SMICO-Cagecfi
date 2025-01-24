<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.base')

@section('content')
    @include('includes.topbar')
    @include('includes.spinner')
    

    <div class="main-content mb-5">

        <div class="row custom-card  ">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">DEPOT {{ env('SOCIETY_NAME') }} VIA MOBILE MONEY</h4>
                    </div>
                    <div class="card-body p-4 mb-4">
                        <form id="myForm" action="{{ route('BankToWallet') }}" method="POST">
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
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">

                                          <div class="mb-1 mt-3">
                                    <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                    <select name="idcptemet" id="compte-select" class="form-control">
                                        @foreach ($comptes as $compte)
                                        <option value="{{ $compte['idcompte'] }}">{{ $compte['nomcompte'] }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="mb-3">
                                    <label for="basicpill-vatno-input" class="form-label">SOLDE</label>

                             
                                    <div class="d-flex align-items-center flex-direction-row gap-3">
                                        <input type="text" readonly class="form-control w-25" id="balance">
                                        <button class="btn btn-primary" id="trigger-api-btn"><i
                                            class="bx bx-refresh fw-bold"></i></button>
                                    </div>
                                </div>
                                
                                    <div class="text-center mb-4">
                                        <h5>Détails sur le numéro de téléphone</h5>
                                    </div>
                                    
                                   
                                        <label class="form-label" for="formrow-password-input">Telephone</label>
                                        <div class="mb-3">
                                            <select name="" id="" class="form-control">
                                                <option value="">{{ $complete_telephone }}</option>
                                                                                        </select>

                                        </select>
                                    </div>

                                    <div class="row">                                                            
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <div class="mb-3">
                                                <select name="" id="" class="form-control">
                                                    <option value="">{{$indicatif }}</option>
                                                </select>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-8 col-lg-8 col-sm-8">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="formrow-password-input" readonly value="{{ $telephone }}">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    
                                    <div class="row">   
                                        <div class="text-right">
                                            <h6>Titulaire</h6>
                                        </div>                                                         
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" readonly id="formrow-password-input" value="{{ $lastName }}">
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" readonly id="formrow-password-input" value="{{ $firstName }}">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    </div>
                                </div>
                            </div>

                            <div class="wizard-tab">
                                    <div class="text-center">
                                        <h5>Détails Monetaires de l'operation</h5>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-6 ">

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">MONTANT</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" name="montantope" class="form-control w-75"
                                                        id="basicpill-lastname-input">
                                                        FCFA
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">FRAIS</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" class="form-control w-50"
                                                        id="basicpill-lastname-input">
                                                    <button class="btn btn-primary"><i class="bx bx-refresh fw-bold"></i></button>
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">Montant a renverser</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" class="form-control w-75"
                                                        id="basicpill-lastname-input">
                                                </div>
                                            </div>

                                            <div class="mb-3">
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
                     hiddenPinField.name = "codepin"; // Le nom que tu veux donner
                     hiddenPinField.value = result.value;
                     form.appendChild(hiddenPinField);
     
                     form.submit();
                 } else if (result.dismiss === Swal.DismissReason.cancel) {
                     Swal.fire({
                         icon: "info",
                         title: "Opération annulée",
                         confirmButtonColor: "#776acf",
                     });
                 }
             });
         }
     </script>

        <script>
            // Exécute le script une fois que le document HTML est complètement chargé
            $(document).ready(function() {
                // Ajoute un événement "click" au bouton avec l'ID "trigger-api-btn"
                $('#trigger-api-btn').on('click', function() {
                    showSpinner('Veuillez patienter...');
                    // showSpinner('Veuillez patienter...');
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
                            datesolde: datesolde
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response.solde) {
                                $('#balance').val(response.solde);
                                if(response.solde ==0){
                                    alertify.error('Solde insuffisant sur le compte.');
                                }
                            } else {
                                alertify.error('Erreur dans la réponse.');
                            }
                        },
                        error: function(xhr, status, error) {
                            alertify.error('Erreur inattendue!');
                            console.error(xhr.responseText);
                            alert("Erreur : " + (xhr.responseJSON?.error || error));
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

<script>
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
