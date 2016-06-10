<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Http\Request;


class Quiz extends Model {

    use SoftDeletes;

    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * les attributs qu'on peut assigner au model.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'conseil', 'auteur'
    ];

    /*
     * Retourne la categorie à laquelle appartient le quiz
     */

    public function categorie() {
        return $this->belongTo('App\Models\Categorie');
    }

    /*
     * Retourne les reponses d'un utilisateur pour un quiz
     */

    public function responsesUtilisateurs() {
        return $this->hasMany('App\Models\ResponseUtilisateur');
    }

    /*
     * Retourne les reponses d'un utilisateur pour un quiz
     */

    public function questionsQuiz() {
        return $this->belongsToMany('App\Models\WuestionQuiz');
    }

    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide(Request $request) {
        
        // Récupération des infos du quiz
        $quiz = $request->only('nom', 'conseil');
        
        // Création du validateur
        $validator = Validator::make($quiz, array(
            'nom' => 'string|required',
            'conseil' => 'string|required',
            //'prout' => 'in:bla,bli,truc|string',
        ));
        
        return $validator;
        
        /*
        return Validator::make($data, array(
                    'nom' => 'string|between:1,60|sometimes|required',
                    'conseil' => 'string|sometimes|required',
                    'auteur' => 'exists:utilisateurs,id|between:1,60|sometimes|required'
                ))->passes();
         * 
         */
    }
    
    /**
     * Vérifie l'existence d'un quiz
     * @param id
     */
    public static function existe($id) {
        
        // recherche quiz dans la BD        
        $quiz = Quiz::where("id", $id)->first();
        
        if(!isset($quiz)) {
            return 'erreur, ce quiz n\'existe pas';
        }
        
        // vérifie qu'il n'est pas déjà validé
        if($quiz->estValide) {
            return 'ce quiz ne peut plus être modifié';
        }
        
        return 'Ouiiiii';
        
    }
    

}
