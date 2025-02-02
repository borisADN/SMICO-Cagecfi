@extends('layouts.base')
@section('content')
    @include('includes.topbar')
    @include('includes.spinner')
    <div class="main-content mb-5">
        <div class="row custom-card">
            <div class="col-lg-12 ">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">REGLEMENT FACTURE</h4>
                    </div>

                    <div class="card-body p-4 mb-4">
                        <form action="">

                            <ul class="wizard-nav">
                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top">
                                            1
                                            <i class="uil uil-list-ul"></i>
                                        </div>
                                    </div>
                                </li>

                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top">
                                            2
                                            <i class="uil uil-clipboard-notes"></i>
                                        </div>
                                    </div>
                                </li>

                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top">
                                            3
                                            <i class="uil uil-clipboard-notes"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>


                            <div class="wizard-tab">
                                <div class="text-center mb-2 mt-2">
                                    <h5>Informations sur le partenaire</h5>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">ID Partenaire</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                {{-- <div class="d-flex align-items-center flex-direction-row gap-3"> --}}
                                                <input type="text" readonly class="form-control w-50" id="balance">
                                                <button class="btn btn-primary" id="trigger-api-btn"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill--input" class="form-label">Nom Du Partenaire</label>
                                            <input name="montantope" type="text" class="form-control"
                                                id="basicpill-pancard-input">
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-namecard-input" class="form-label">Partenariat</label>
                                            <select class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="wizard-tab">
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
                                            <div class="d-flex justify-content-between align-items-center">
                                                {{-- <div class="d-flex align-items-center flex-direction-row gap-3"> --}}
                                                <input type="text" readonly class="form-control w-25" id="balance">
                                                <button class="btn btn-primary" id="trigger-api-btn"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="wizard-tab">
                                <div class="text-center mb-2 mt-2">
                                    <h5>Details de L'operation</h5>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">


                                        <div class="mb-1">
                                            <label for="basicpill-pancard-input" class="form-label">MONTANT</label>
                                            <input name="montantope" type="text" class="form-control"
                                                id="basicpill-pancard-input">
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">Commission</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                {{-- <div class="d-flex align-items-center flex-direction-row gap-3"> --}}
                                                <input type="text" readonly class="form-control w-25" id="balance">
                                                <button class="btn btn-primary" id="trigger-api-btn"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-pancard-input" class="form-label">N° De Facture</label>
                                            <input name="montantope" readonly type="text" class="form-control"
                                                id="basicpill-pancard-input">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <button type="button" class="btn btn-primary w-sm" id="prevBtn"
                                    onclick="nextPrev(-1)">Precedent</button>
                                <button type="button" class="btn btn-primary w-sm ms-auto"
                                    id="nextBtn">Suivant</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>

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
    </script>
    @include('includes.footer')
@endsection
