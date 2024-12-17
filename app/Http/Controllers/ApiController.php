<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


// Laravel intègre Guzzle, un client HTTP pour envoyer des requêtes HTTP (comme GET, POST, PUT, DELETE, etc.)
//Installer Guzzle via composer   |composer require guzzlehttp/guzzle|

class ApiController extends Controller
{
    public function Apilogin(Request $request)
    {
        $link = "https://creditdusahel.net:8081/DEMO_APIEXTERNE_CDS_WEB/FR/APIEXTERNE/pmobileapi.awp";

        $username = $request->username;
        $password = $request->psd;

        $response = Http::withOptions([
            'verify' => false,
        ])->post($link, [
            'codeapi' => 'pmobile',
            'methode' => 'wsessionouverture',
            'codeutilisateur' => "$username",
            'motpasse' => "$password",
            'typesession' => 'C',
            'codeemei' => '',
            'ipsession' => '',
            'plateforme' => '1',
            'tokenphone' => '',
            'typedetail' => 'SANS_DEMANDE_SERVICE SANS_OBJET_FIN SANS_PERIODICITE SANS_OBJET_FIN',
            'versionapp' => ''
        ]);

        if ($response->successful()) {
            $data = $response->json();

            session(['data' => $data]);

            $data1 = $data['listehabil'];

            $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/json/menu.json';

            $data2 = file_get_contents($path);

            $data2 = json_decode($data2, true);

            // return response()->json($data1);

            // $codeoptions = array_map(function ($item) {
            //     var_dump($item);  // Affiche chaque élément de $data1
            //     return $item;
            // }, $data1);
            

            $codeoptions = array_map(function ($item) {
                return $item['codeoption'];
            }, $data1);

            // return $codeoptions = response()->json( $codeoptions);
            // return $codeoptions;
            
            // Résultat de la comparaison
            $synthese = [];

            foreach ($data2['menu'] as $menuKey => $menu) {
                foreach ($menu['optionsMenu'] as $option) {
                    // Comparer les 'numOption' avec les 'codeoption'
                    if (in_array($option['numOption'], $codeoptions)) {
                        // Ajouter à la synthèse les données de l'option correspondante
                        $synthese[] = [
                            'libMenu' => $menu['libMenu'],
                            'libOption' => $option['libOption'],
                            'numOption' => $option['numOption'],
                            'urlParam' => $option['urlParam']
                        ];
                    }
                }
            }

            return response()->json($synthese);
            
            

























            //sauvegarder la donnee dans une session 
            $data = $response->json();
            //json
            // $data = json_encode($data,true);

            //charger un fichier dans une variable
            //charger un fichier 
            // $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/json/menu.json';
        
            // $data = file_get_contents($path);

            // $data = json_decode($data, true);



            //stocker les données dans une session  (utilisation de la fonction session() de Laravel)
            session(['data' => $data]);
            // $data['listehabil']
            //rediriger vers une page
            // return session('data');
            return response()->json($data);
            // return response()->json($response->json());
        } else {
            return response()->json(['error' => 'API Error'], 500);
        }
    }
}
