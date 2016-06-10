<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
//use Request;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;


class QuestionQuiz extends Model
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
        'description','explication'
    ];

    /*
     * Retourne les quiz auxquels appartient 
     * une question
     */

    public function quiz() {
        return $this->belongsToMany('App\Models\Quiz');
    }

    /*
     * Retourne les reponses qui concernent une question
     */

    public function responseQuiz() {
        return $this->hasMany('App\Models\ResponseQuiz');
    }

    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide(Request $request) {
        
        $question = $request->only('question');
        
        // Création du validateur avec les inputs nettoyés et les règles
        $validator = Validator::make($question, array(
            'question' => 'string|required',
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
    
    public static function creer() {
        
        $question = new Question();
        
        //$question->
        
    }
}
