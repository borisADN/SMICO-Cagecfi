<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;


// Laravel intègre Guzzle, un client HTTP pour envoyer des requêtes HTTP (comme GET, POST, PUT, DELETE, etc.)
//Installer Guzzle via composer   |composer require guzzlehttp/guzzle|

class ApiController extends Controller
{
    public function Apilogin(Request $request)
    {

        try {
            $ApiLink = "https://creditdusahel.net:8081/DEMO_APIEXTERNE_CDS_WEB/FR/APIEXTERNE/pmobileapi.awp";
            // $ApiLink = "http://192.168.102.10/APIEXTERNE_DEMO_WEB/FR/APIEXTERNE/pmobileapi.awp";

            session(['typeSession' => 'C']);
            // Récupérer les données du formulaire
            $username = $request->username;
            $password = $request->psd;

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

                    if (!isset($data['listehabil'], $data['descriptreponse'])) {
                        session()->flash('alert', 'error');
                        session()->flash('message', 'Données de réponse invalides.');
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

                        // Stocker les informations du client en session
                        session(['clientInfo' => $data2]);
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

        $ApiLink = "https://creditdusahel.net:8081/DEMO_APIEXTERNE_CDS_WEB/FR/APIEXTERNE/pmobileapi.awp";

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
            $solde = $solde_data['referencereponse'];
            return response()->json(['solde' => $solde]);
        } else {
            // cas d'erreur, retourner un message d'erreur
            return response()->json(['error' => 'Erreur lors de la récupération du solde'], 500);
        }
    }

    public function accountTransfert(Request $request)
    {
        try {
            $data = $request->all();

            set_time_limit(60);

            $ApiLink = "https://creditdusahel.net:8081/DEMO_APIEXTERNE_CDS_WEB/FR/APIEXTERNE/pmobileapi.awp";
            $response = Http::withOptions(['verify' => false])->post($ApiLink, [
                'codeapi' => 'pmobile',
                'methode' => 'wtransfertcompte',
                'refsession' => session('referencereponse'),
                'idcptemet' => $data['idcptemet'],
                'idcptrecept' => $data['idcptrecept'],
                'montantope' => $data['montantope'],
                'codepinagent' => '',
                'codeotp' => '',
                'idtypeoperation' => 12,
                'descriptionoperation' => '',
                'suffixedescription' => '',
                'commission' => 0,
                'refmanuel' => '',
                'codepinemet' => $data['codepinemet'],
            ]);
            if($data['idcptrecept']==$data['idcptemet']){
                session()->flash('alert', 'error');
                session()->flash('message', 'Les comptes sont identiques!');
                return redirect()->back();
            }
            if ($response->successful()) {
                $ApiResponse = $response->json();
                $ApiMessage = $ApiResponse['descriptreponse'];
                if ($ApiMessage == 'SUCCESS'){
                    session()->flash('alert', 'success');
                    session()->flash('message', $ApiMessage);
                    return redirect()->back();
                }else{
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

    public function commissionVirement(Request $request){
        $data = $request->all();

        $ApiLink = "https://creditdusahel.net:8081/DEMO_APIEXTERNE_CDS_WEB/FR/APIEXTERNE/pmobileapi.awp";
        $response = Http::withOptions(['verify' => false])->post($ApiLink, [
            'codeapi' => 'pmobile',
            'methode' => 'wmontantcommission',
            'refsession' => session('referencereponse'),
            'categoriefrais' => "WB",
            'typecommi' => "",
            'montantope' => $data['montantope'],
            'typeope' => 12,
            'idcpte' => $data['idcompte'],
            'estinclus' => false,
        ]);
        if ($response->successful()){
            $apiResponse = $response->json();
            $commission = $apiResponse['referencereponse'];
            return response()->json(['commission' => $commission]);
            // return response()->json(['commission' => $response->json()]);
            // return $response;
        }else{
            return "error";
        }
        


    }
}
