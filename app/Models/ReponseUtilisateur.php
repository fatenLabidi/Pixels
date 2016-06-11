<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReponseUtilisateur extends Model
{
    use SoftDeletes;

    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * les attributs qu'on peut assigner au model.
     * ICI on ne peut rien saisir 
     *
     * @var array
     */
    protected $guarded = [
        '*'
    ];

    /*
     * Retourne le propriétaire de la réponse
     */

    public function utilisateur() {
        return $this->belongsTo('App\Models\Utilisateur');
    }

    /*
     * Retourne les reponses d'un utilisateur pour un quiz
     */

    public function quiz() {
        return $this->belongsTo('App\Models\Quiz');
    }

    /*
     * Retourne les reponses d'un utilisateur pour un quiz
     */

    public function reponsesQuiz() {
        return $this->belongsTo('App\Models\QuestionQuiz');
    }

}
