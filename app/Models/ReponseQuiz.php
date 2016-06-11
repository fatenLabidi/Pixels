<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

use Illuminate\Http\Request;

class ReponseQuiz extends Model
{
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
        'description','estBonneReponse'
    ];

    /*
     * Retourne les reponses utilisateur qui contiennent
     * une question
     */

    public function reponsesUtilisateurs() {
        return $this->hasMany('App\Models\ReponseUtilisateur');
    }

    /*
     * Retourne les reponses qui concernent une question
     * de quiz
     */

    public function quiz() {
        return $this->belongsTo('App\Models\Quiz');
    }

    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide(Request $request) {
        
        // Récupération des réponses
        $reponses = $request->only('reponse');
        
        // Supprime les entrées "fausse"
        foreach ($reponses as $reponse) {
            $reponses['reponse'] = array_filter($reponse);
        }
        $reponses['reponse'] = array_filter($reponses['reponse']);
        
        // Création du validateur avec les inputs nettoyés et les règles
        $validator = Validator::make($reponses, array(
            'reponse.0' => 'string|required',
            'reponse.1' => 'string|required',
            'reponse.*' => 'string|sometimes',
        ));
        
        return $validator;
        
        /*
        return Validator::make($data, array(
                    'explication' => 'string|between:1,60|sometimes|required',
                    'description' => 'string|sometimes|required',
                ))->passes();
         * 
         */
    }
    
}
