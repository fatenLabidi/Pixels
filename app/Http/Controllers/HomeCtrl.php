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
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Affiche la page principale
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retourne la vue "home" -> (\resources\views\home.blade.php)
        return view('home');
    }

}