<?php

/**
 * Modèle utilisateur
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Utilisateur extends Model {

    use SoftDeletes;

    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];
    public $hidden = ['motDePasse'];

    //Jointures 

    /*
     * Retourne les groupes auxquels appartient un utilisateur
     */
    public function groupes() {
        return $this->belongsToMany('App\Models\Groupe')->withTimestamps();
    }

    /*
     * Retourne le pays d'un utilisateur
     */

    public function pays() {
        return $this->belongsTo('App\Models\Pays')->withTimestamps();
    }

    /*
     * Retourne la question seceret d'un utilisateur
     */

    public function questionSecrete() {
        return $this->belongsTo('App\Models\QuestionSecrete')->withTimestamps();
    }

    /*
     * Retourne la region d'un utilisateur
     */

    public function region() {
        return $this->belongsTo('App\Models\Region')->withTimestamps();
    }

    /*
     * Retourne les reponses de quiz d'un utilisateur
     */

    public function responsesUtilisateurs() {
        return $this->hasMany('ResponsesUtilisateurs')->withTimestamps();
    }

    /*
     * Permet de verifier si un utilisateur a un droit spécifique 
     * @return bool true si l'e groupe'utilisateur a l'acces à un service 
     */

    public function aAcces($service) {
        $acces = Acces::aAcces($service);
        $service = $acces->ServiceApplicatif()->where('nom', '=', $service)->first();
        // Verifie que le groupe a acces au service applicatif
        return isset($service);
    }

    /*
     * Permet de verifier si un utilisateur existe dans la BD
     * @return bool true si l'e groupe'utilisateur a l'acces à un service 
     */

    public static function existe($pseudo) {
        return self::find($pseudo) !== null;
    }

    /*
     * Permet de valider le model 
     * 
     */

    public static function estValide($utilisateur = array()) {
        return Validator::make($utilisateur, array(
                    'pseudo' => 'unique:utilisateurs,pseudo|sometimes|required',
                    'motDePasse' => 'string|between:1,100|sometimes|required',
                    'anneeNaissance' => 'date|between:1,60|sometimes|required',
                    'sexe' => 'string|between:1,20|sometimes|required',
                    'email' => 'email|between:3,60|sometimes|required',
                    'reponseQuestionSecrete' => 'string|sometimes|required',
                    'paysId' => 'exists:pays,id|sometimes|required',
                    'regionId' => 'exists:regions,id|sometimes|required',
                    'questionSecreteId' => 'exists:questionsSecretes,id|sometimes|required',
        ))->passes();
    }

}
