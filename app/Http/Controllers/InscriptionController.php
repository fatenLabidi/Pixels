<?php

//namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use App\Lib\Message;
//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Hash;
use Validator;
use Request;
use Illuminate\Support\Facades\Session;

class InscriptionController extends Controller {

    /**
     * Affiche une liste des ressources
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('auth/login');
    }

    public function connexion() {

        $inputsUtilisateur = Request::only('pseudo', 'motDePasse');

        // Validation des entrées
        if (!Utilisateur::estValide($inputsUtilisateur)) {
            // Retour si échec
            //return redirect()->back()->withInput()->withErrors($validate);
        }

        // Récupération de l'utilisateur correspondant dans la BD
        $utilisateur = Utilisateur::where("pseudo", $inputsUtilisateur['pseudo'])->first();
        
        // Vérification existence utilisateur
        if (!isset($utilisateur)) {
            return 'Identifiants incorrects.';
        }        
        
        // Vérification mot de passe
        if (!Hash::check($inputsUtilisateur['motDePasse'], $utilisateur->motDePasse)) {
            return 'Identifiants incorrects.';
        }

        // Authentification persistance
        Session::put('utilisateur_pseudo', $utilisateur->pseudo);
        return 'Connexion réussie.';
    }

    public function deconnexion() {
        Session::forget('utilisateur_pseudo');
        return 'Déconnexion réussie.';
    }

    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'pseudo' => 'required|max:255',
                    'password' => 'required|min:6',
                ])->passes();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

}
