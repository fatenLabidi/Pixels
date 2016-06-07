<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Hash;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {
    
    /**
     * Affiche une liste des ressources
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('auth\login');
    }

    /*
    public function connexion() {
        $motDePasse = Request::input('motDePasse', '');
        $pseudo = Request::input('pseudo', '');
        
        $utilisateur = Utilisateur::where("pseudo", $pseudo)->first();

        // Vérification utilisateur existe
        if (!isset($utilisateur)) {
            return 'Connexion échouée.';
        }

        // Vérification mot de passe
        if (!Hash::check($motDePasse, $utilisateur->password)) {
            return 'Connexion échouée.';
        }

        // Authentification persistance
        Session::put('utilisateur_pseudo', $utilisateur->pseudo);
        return 'Connexion réussie.';
    }

    public function deconnexion() {
        Session::forget('utilisateur_pseudo');
        return 'Déconnexion réussie.';
    }
     */

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
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
        ]);
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
