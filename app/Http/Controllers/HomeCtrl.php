<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class HomeCtrl extends Controller {

    /**
     * Crée une nouvelle instance du controller
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Affiche la page principale
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        /*
        $data = '{"actualites":[
            {"id":"1", "titre":"Une jolie nouvelle", "explication":"coucou"},
            {"id":"2", "titre":"Autre nouvelle", "explication":"proutoutout dk fjgd"},
            {"id":"3", "titre":"Gné nouvelle", "explication":"profdsgutoutout dk fjgd"},
            {"id":"4", "titre":"Adsifghsvelle", "explication":"proutoutogut dk fjgd"},
            {"id":"5", "titre":"Bad news ...", "explication":"lol"}
        ]}';
         
         */
        
       $data = '[{
            "titre": "deuxieme",
             "explication": "le cul",
             "id":1
            },
             {
            "titre": "dernier",
             "explication": "blabla",
             "id":2
            },
             {
            "titre": "arrive en premier",
             "explication": "Adrien",
             "id":0
            }]';

        //$data = json_decode($data, true);
        //$employees = json_decode($data, true);
        
        return view('home', ['superdonnees' => json_decode($data, true)]);
    }

}
