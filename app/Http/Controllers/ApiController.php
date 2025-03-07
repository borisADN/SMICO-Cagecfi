<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use RealRashid\SweetAlert\Facades\Alert;


// Laravel intègre Guzzle, un client HTTP pour envoyer des requêtes HTTP (comme GET, POST, PUT, DELETE, etc.)
//Installer Guzzle via composer   |composer require guzzlehttp/guzzle|

class ApiController extends Controller
{
    // Fonction pour recuperer l'id de l'operation en cours
    public function getSettingValueFromSession($key)
    {
        $settings = session('settings', collect());
        return $settings->get($key, null);
    }

    public function Apilogin(Request $request)
    {

        session(['ApiLink' => 'http://139.99.184.102/APIEXTERNE_ACEFINANCE_WEB/FR/APIEXTERNE/pmobileapi.awp']);            // $ApiLink = "https://creditdusahel.net:8081/DEMO_APIEXTERNE_CDS_WEB/FR/APIEXTERNE/pmobileapi.awp";
        try {
            // $ApiLink = "http://192.168.102.10/APIEXTERNE_DEMO_WEB/FR/APIEXTERNE/pmobileapi.awp";
            $ApiLink = session('ApiLink');

            //type de session client ou agent
            session(['typeSession' => 'C']);

            // Récupérer les données du formulaire
            $username = $request->username;
            $password = $request->psd;

            if (empty($username) || empty($password)) {
                session()->flash('alert', 'error');
                session()->flash('message', 'Veuillez fournir un nom d’utilisateur et un mot de passe.');
                return redirect()->back();
            }

            $response = Http::withOptions(['verify' => false])->post($ApiLink, [
                'codeapi' => 'pmobile',
                'methode' => 'wsessionouverture',
                'codeutilisateur' => $username,
                'motpasse' => $password,
                'typesession' => session('typeSession'),
                'codeemei' => '',
                'ipsession' => '',
                'plateforme' => '1',
                'tokenphone' => '',
                'typedetail' => 'SANS_DEMANDE_SERVICE SANS_OBJET_FIN SANS_PERIODICITE SANS_OBJET_FIN',
                'versionapp' => ''
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if ($data['descriptreponse'] === 'SUCCESS') {

                    session()->put('referencereponse', $data['referencereponse']);

                    // Transformer le tableau en format clé-valeur
                    $formattedData = collect($data['settings'])->pluck('referenceReponse', 'descriptReponse');
                    // return $formattedData;
                    session()->put('settings', $formattedData);



                    if (!isset($data['listehabil'], $data['descriptreponse'])) {
                        session()->flash('alert', 'error');
                        session()->flash('message', 'Merci de bien vouloir vous adresser à un administrateur pour obtenir les habilitations nécessaires');
                        return redirect()->back();
                    }

                    $codeoptions = array_column($data['listehabil'], 'codeoption');

                    // Ici, array_column est utilisé pour récupérer uniquement les valeurs associées à la clé codeoption dans chaque sous-tableau de $data['listehabil'].
                    $path = public_path('assets/json/menu.json');
                    $data2 = json_decode(file_get_contents($path), true);
                    $synthese = [];

                    // Itération sur les menus principaux de data2
                    foreach ($data2['menu'] as $menuKey => $menu) {

                        // Sous-itération sur les options disponibles dans chaque menu
                        foreach ($menu['optionsMenu'] as $option) {

                            // Comparer l'identifiant de l'option (numOption) 
                            // avec les codeoptions disponibles pour l'utilisateur
                            if (in_array($option['numOption'], $codeoptions)) {

                                // Si l'option est autorisée, ajouter ses informations à la synthèse
                                $synthese[] = [
                                    'head' => $menu['dataKey'],
                                    'libMenu' => $menu['libMenu'],  // Nom du menu principal
                                    'dataKey' => $menu['dataKey'] . '-' . $option['numOption'],  // Ajoute un suffixe unique au dataKey
                                    'libOption' => $option['libOption'],  // Nom de l'option
                                    'numOption' => $option['numOption'],  // Identifiant de l'option
                                    'urlParam' => $option['urlParam']  // Paramètre d'URL associé
                                ];
                            }
                        }
                    }

                    $groupedOptions = [];
                    foreach ($synthese as $option) {
                        $groupedOptions[$option['libMenu']][] = $option;
                    }
                    // return $groupedOptions;
                    $ldsSpace = $groupedOptions['LDSpace'];
                    // Supprimer le menu LDSpace de la synthèse pour ne pas afficher son contenu dans le menu

                    unset($groupedOptions['LDSpace']);
                    session(['groupedOptions' => $groupedOptions]);
                    // session(['groupedOptions' => $groupedOptions, 'expires' => now()->addMinutes(30)]);

                    // session()->setExpirationCallback(function () {
                    //     return redirect()->route('logout');
                    //     // Code à exécuter à l'expiration de la session
                    //     // Par exemple, supprimer les données de session
                    //     // session()->forget('groupedOptions');
                    //     // session()->forget('userSpace');
                    // });

                    session(['userSpace' => $ldsSpace]);

                    // Faire un autre appel API pour récupérer des informations sur l'utilisateur connecté
                    $response2 = Http::withOptions(['verify' => false])->post($ApiLink, [
                        'codeapi' => 'pmobile',
                        'methode' => 'winfoidentite',
                        'refsession' => session('referencereponse'),
                        'ididentite' => 0
                    ]);

                    if ($response2->successful()) {

                        $clientInfos = $response2->json();
                        session(['complete_name' => $clientInfos['nom'] . ' ' . $clientInfos['prenom']]);
                        session(['complete_telephone' => $clientInfos['indicatiftel'] . $clientInfos['numtel']]);
                        session(['firstName' => $clientInfos['prenom']]);
                        session(['lastName' => $clientInfos['nom']]);
                        session(['indicatif' => $clientInfos['indicatiftel']]);
                        session(['telephone' => $clientInfos['numtel']]);


                        // Stocker les informations du client en session
                        // session(['clientInfo' => $data2]);
                    }

                    //avoir les infos des comptes
                    $response3 = Http::withOptions(['verify' => false])->post($ApiLink, [
                        'codeapi' => 'pmobile',
                        'methode' => 'wcomptes',
                        'refsession' => session('referencereponse'),
                        'devise' => '',
                        'produit' => '',
                        'identite' => $clientInfos['id_identite'],
                        'typeIdentite' => '',
                        'typeCompte' => '',
                    ]);

                    if ($response3->successful()) {
                        $comptes = $response3->json();
                        // La methode json() Par défaut, retourne un tableau associatif en PHP, car c'est souvent plus pratique pour manipuler des données.
                        // Cela évite à l'utilisateur d'avoir à appeler manuellement json_decode($response->body()) pour obtenir les données sous forme exploitable.
                        session(['compte_id' => $comptes[0]['idcompte']]);
                        session(['comptes' => $comptes]);
                    }
                    return redirect()->route('home');
                } else {
                    session()->flash('alert', 'error');
                    session()->flash('message', $data['descriptreponse']);
                    return redirect()->back();
                }
            } else {
                session()->flash('alert', 'error');
                session()->flash('message', 'Erreur lors de la connexion à l\'API.');
                return redirect()->back();
            }
        } catch (ConnectionException $e) {
            session()->flash('alert', 'error');
            session()->flash('message', 'Erreur de connexion');
            return redirect()->back();
        } catch (Exception $e) {
            // return $e;
            session()->flash('alert', 'error');
            session()->flash('message', 'Une erreur inattendue : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function checkBalance(Request $request)
    {

        $validated = $request->validate([
            'codeapi' => 'required|string',
            'methode' => 'required|string',
            'idcompte' => 'required|string',
            'montantcommission' => 'required|numeric',
            'datesolde' => 'required|string',
        ]);

        $ApiLink = session('ApiLink');
        $response = Http::withOptions(['verify' => false])->post($ApiLink, [
            'codeapi' => $validated['codeapi'],
            'methode' => $validated['methode'],
            'refsession' => session('referencereponse'),
            'idcompte' => $validated['idcompte'],
            'montantcommission' => $validated['montantcommission'],
            'datesolde' => $validated['datesolde'],
        ]);

        // Vérifie que la réponse est bien un JSON
        if ($response->successful()) {
            $solde_data = $response->json();
            // return response()->json(['solde' => $solde_data]);
            if (array_key_exists('referencereponse', $solde_data) && !empty($solde_data['referencereponse'])) {
                $solde = $solde_data['referencereponse'];
                return response()->json(['solde' => $solde]);
            } else {
                // Dans le cas ou le solde est insuffisant , afficher 0!
                return response()->json(['solde' => '0']);
            }
        } else {
            // cas d'erreur, retourner un message d'erreur
            return response()->json(['error' => 'Erreur lors de la récupération du solde'], 500);
        }
    }

    public function accountTransfert(Request $request)
    {
        try {
            $valeur = $this->getSettingValueFromSession('TYPE_OPE_VIREMENT_COMPTE');
            // return $valeur; // Affichera "3" si la clé existe

            $data = $request->all();
            if ($data['idcptrecept'] == $data['idcptemet']) {
                session()->flash('alert', 'error');
                session()->flash('message', 'Les comptes sont identiques!');
                return redirect()->back();
            }
            set_time_limit(60);

            $ApiLink = session('ApiLink');
            $response = Http::withOptions(['verify' => false])->post($ApiLink, [
                'codeapi' => 'pmobile',
                'methode' => 'wtransfertcompte',
                'refsession' => session('referencereponse'),
                'idcptemet' => $data['idcptemet'],
                'idcptrecept' => $data['idcptrecept'],
                'montantope' => $data['montantope'],
                'codepinagent' => '',
                'codeotp' => '',
                'idtypeoperation' => $valeur,
                'descriptionoperation' => '',
                'suffixedescription' => '',
                'commission' => 0,
                'refmanuel' => '',
                'codepinemet' => $data['codepinemet'],
            ]);



            if ($response->successful()) {
                $ApiResponse = $response->json();
                $ApiMessage = $ApiResponse['descriptreponse'];
                if ($ApiMessage == 'SUCCESS') {
                    session()->flash('alert', 'success');
                    session()->flash('message', 'Votre opération a été effectuée avec succès.');
                    return redirect()->back();
                } else {
                    session()->flash('alert', 'error');
                    session()->flash('message', $ApiMessage);
                    return redirect()->back();
                }
            } else {
                session()->flash('alert', 'error');
                session()->flash('message', 'Erreur lors du Transfert!');
                return redirect()->back();
            }
        } catch (ConnectionException $e) {
            session()->flash('alert', 'error');
            session()->flash('message', 'Vérifiez votre Connexion!');
            return redirect()->back();
        } catch (Exception $e) {
            // return $e->getMessage();
            session()->flash('alert', 'error');
            session()->flash('message', 'Une erreur inattendue ! ');
            return redirect()->back();
        }
    }

    public function commissionVirement(Request $request)
    {
        
        $data = $request->all();
        $valeur = $this->getSettingValueFromSession('TYPE_OPE_VIREMENT_COMPTE');
        $ApiLink = session('ApiLink');
        $response = Http::withOptions(['verify' => false])->post($ApiLink, [
            'codeapi' => 'pmobile',
            'methode' => 'wmontantcommission',
            'refsession' => session('referencereponse'),
            'categoriefrais' => "WB",
            'typecommi' => "",
            'montantope' => $data['montantope'],
            'typeope' => $valeur,
            'idcpte' => $data['idcompte'],
            'estinclus' => false,
        ]);
        if ($response->successful()) {
            $apiResponse = $response->json();
            $commission = $apiResponse['referencereponse'];
            return response()->json(['commission' => $apiResponse]);
        } else {
            return "error";
        }
    }

    public function getReceiverInfo_virement(Request $request)
    {
        $data = $request->all();
        $ApiLink = session('ApiLink');
        $response = Http::withOptions(['verify' => false])->post($ApiLink, [
            'codeapi' => 'pmobile',
            'methode' => 'winfocodeclientoperation',
            'refsession' => session('referencereponse'),
            'codeclient' => $data['codeclient'] ?? '',
            'typeclient' => "E",
            'ididentite' => $data['id_mobile'] ?? '',
            'operationafaire' => "RECEPTION_VIREMENT",
        ]);
        if ($response->successful()) {
            $apiResponse = $response->json();
            return response()->json(['apiResponse' => $apiResponse]);
        } else {
            return "error";
        }
    }

    public function virementProcess(Request $request)
    {
        try {
            $data = $request->all();
            $id_type_operation = $this->getSettingValueFromSession('TYPE_OPE_VIREMENT_COMPTE');

            if ($data['idcptrecept'] == $data['idcptemet']) {
                session()->flash('alert', 'error');
                session()->flash('message', 'Les comptes sont identiques!');
                return redirect()->back();
            }

            set_time_limit(60);
            $ApiLink = session('ApiLink');
            $response = Http::withOptions(['verify' => false])->post($ApiLink, [
                'codeapi' => 'pmobile',
                'methode' => 'wtransfertcompte',
                'refsession' => session('referencereponse'),
                'idcptemet' => $data['idcptemet'],
                'idcptrecept' => $data['idcptrecept'],
                'montantope' => $data['montantope'],
                'codepinagent' => '',
                'codeotp' => '',
                'idtypeoperation' => $id_type_operation,
                'descriptionoperation' => '',
                'suffixedescription' => '',
                'commission' => 0,
                'refmanuel' => '',
                'codepinemet' => $data['codepinemet'],
            ]);

            if ($response->successful()) {
                $ApiResponse = $response->json();
                $ApiMessage = $ApiResponse['descriptreponse'];
                if ($ApiMessage == 'SUCCESS') {
                    session()->flash('alert', 'success');
                    session()->flash('message', $ApiMessage);
                    return redirect()->back();
                } else {
                    session()->flash('alert', 'error');
                    session()->flash('message', $ApiMessage);
                    return redirect()->back();
                }
            } else {
                session()->flash('alert', 'error');
                session()->flash('message', 'Erreur lors du Transfert!');
                return redirect()->back();
            }
        } catch (ConnectionException $e) {
            session()->flash('alert', 'error');
            session()->flash('message', 'Vérifiez votre Connexion!');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('alert', 'error');
            session()->flash('message', 'Une erreur inattendue ! ');
            return redirect()->back();
        }
    }

    public function BankToWallet(Request $request)
    {
        try {

            $data = $request->all();

            set_time_limit(60);

            $ApiLink = session('ApiLink');
            $response = Http::withOptions(['verify' => false])->post($ApiLink, [
                'codeapi' => 'pmobile',
                'methode' => 'wbanktowalet',
                'refsession' => session('referencereponse'),
                'numcel' => session('complete_telephone'),
                'codeotp' => '',
                'benefnom' => session('lastName'),
                'benefprenom' => session('firstName'),
                'commentaire' => '',
                'refopration' => 12,
                'idcompte' =>  $data['idcptemet'],
                'montantope' => $data['montantope'],
                'clientotp' => "1259633",
                'idoperateur' => 1001,
                'codeservice' => 'MAVIANCE_MOMO_ORANGE',
                'numcelrecept' => '',
                'typeoperecep' => '',
                'receptnom' => 12,
                'idoperateurrecept' => 0,
                'codeservicerecept' => '',
                'idcarte' => '',
                'pan4' => '',
                'idproduitcarte' => 1,
                'idmonetiquecarte' => 0,
                'idtypeoperecept' => 0,
                'montantrecept' => 0,
                'commirecept' => 0,
                'codepin' => $data['codepin'],
            ]);

            if ($response->successful()) {
                $ApiResponse = $response->json();
                $ApiMessage = $ApiResponse['descriptreponse'];
                if ($ApiMessage == 'SUCCESS') {
                    session()->flash('alert', 'success');
                    session()->flash('message', $ApiMessage);
                    return redirect()->back();
                } else {
                    session()->flash('alert', 'error');
                    session()->flash('message', $ApiMessage);
                    return redirect()->back();
                }
            } else {
                session()->flash('alert', 'error');
                session()->flash('message', 'Erreur lors de l\'operation!');
                return redirect()->back();
            }
        } catch (ConnectionException $e) {
            session()->flash('alert', 'error');
            session()->flash('message', 'Vérifiez votre Connexion!');
            return redirect()->back();
        } catch (Exception $e) {
            //    return $e->getMessage();
            session()->flash('alert', 'error');
            session()->flash('message', 'Erreur inattendue ! ');
            return redirect()->back();
        }
    }

    public function WalletToBank(Request $request)
    {
        try {

            // return $request;
            $data = $request->all();

            set_time_limit(60);
            $ApiLink = session('ApiLink');
            $response = Http::withOptions(['verify' => false])->post($ApiLink, [
                'codeapi' => 'pmobile',
                'methode' => 'wwalettobank',
                'refsession' => session('referencereponse'),
                'numcel' => session('complete_telephone'),
                'codeotp' => '',
                'benefnom' => session('lastName'),
                'benefprenom' => session('firstName'),
                'commentaire' => '',
                'refopration' => 12,
                'idcompte' =>  $data['idcptemet'],
                'montantope' => $data['montantope'],
                'clientotp' => "1259633",
                'idoperateur' => 1001,
                'codeservice' => 'MAVIANCE_MOMO_ORANGE',
                'numcelrecept' => '',
                'typeoperecep' => '',
                'receptnom' => 12,
                'idoperateurrecept' => 0,
                'codeservicerecept' => '',
                'idcarte' => '',
                'pan4' => '',
                'idproduitcarte' => 1,
                'idmonetiquecarte' => 0,
                'idtypeoperecept' => 0,
                'montantrecept' => 0,
                'commirecept' => 0,
                'codepin' => $data['codepin'],
            ]);

            if ($response->successful()) {
                $ApiResponse = $response->json();
                $ApiMessage = $ApiResponse['descriptreponse'];
                if ($ApiMessage == 'SUCCESS') {
                    session()->flash('alert', 'success');
                    session()->flash('message', $ApiMessage);
                    return redirect()->back();
                } else {
                    session()->flash('alert', 'error');
                    session()->flash('message', $ApiMessage);
                    return redirect()->back();
                }
            } else {
                session()->flash('alert', 'error');
                session()->flash('message', 'Erreur lors de l\'operation!');
                return redirect()->back();
            }
        } catch (ConnectionException $e) {
            session()->flash('alert', 'error');
            session()->flash('message', 'Vérifiez votre Connexion!');
            return redirect()->back();
        } catch (Exception $e) {
            //    return $e->getMessage();
            session()->flash('alert', 'error');
            session()->flash('message', 'Erreur inattendue ! ');
            return redirect()->back();
        }
    }
}
