@extends('layouts.base')
@section('content')
    @include('includes.topbar')
    <div class="main-content mb-5">
        <div class="row custom-card">
            <div class="col-lg-12 ">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">MISE A DISPOSITION</h4>
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
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">
                                        <div class="mb-1">
                                            <label for="basicpill-namecard-input" class="form-label">Type Operation</label>
                                            <select name="idcptemet" id="compte-select" class="form-control">
                                                <option value="">MISE A DISPOSITION</option>
                                                {{-- @foreach ($comptes as $compte)
                                                    <option value="{{ $compte['idcompte'] }}">{{ $compte['nomcompte'] }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                            <select name="idcptemet" id="compte-select" class="form-control">
                                                @foreach ($comptes as $compte)
                                                    <option value="{{ $compte['idcompte'] }}">{{ $compte['nomcompte'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                            <div class="text-center mb-2 mt-2">
                                                <h5>Informations de l'expediteur</h5>
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-pancard-input" class="form-label">TELEPHONE</label>
                                                <input name="montantope" type="text" class="form-control"
                                                    id="basicpill-pancard-input">
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
                                    <h5>Informations Du Bénéficiaire</h5>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">
                                        <div class="mb-1">
                                            <label for="basicpill-pancard-input" class="form-label">TELEPHONE</label>
                                            <input name="montantope" type="text" class="form-control"
                                                id="basicpill-pancard-input">
                                        </div>
                                            
                                        <div class="mb-1">
                                            <label for="basicpill-pancard-input" class="form-label">NOM</label>
                                            <input name="montantope" type="text" class="form-control"
                                                id="basicpill-pancard-input">
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-pancard-input" class="form-label">PRENOM</label>
                                            <input name="montantope" type="text" class="form-control"
                                                id="basicpill-pancard-input">
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
                                            <label for="basicpill-pancard-input" class="form-label">A Reverser</label>
                                            <input name="montantope" readonly type="text" class="form-control"
                                                id="basicpill-pancard-input">
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
                                <button type="button" class="btn btn-primary w-sm ms-auto"
                                    id="nextBtn">Suivant</button>
                            </div>
                        </form>
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
            </div>
        @endsection
