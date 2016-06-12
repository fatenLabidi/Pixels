<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
//use Request;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
use App\Models\QuestionQuiz;
use App\Models\ReponseQuiz;
use App\Models\QuestionQuizQuiz;

class QuestionQuiz extends Model {

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
        'description', 'explication'
    ];

    /*
     * Retourne les quiz auxquels appartient 
     * une question
     */

    public function quizzes() {
        return $this->belongsToMany('App\Models\Quiz', 'questionQuiz_Quiz', 'questionQuiz_id', 'quiz_id');
    }

    /*
     * Retourne les reponses qui concernent une question
     */

    public function reponseQuiz() {
        return $this->hasMany('App\Models\ReponseQuiz');
    }

    /*
     * Permet de valider le model 
     * 
     */

    public static function estValide(Request $request) {

        $question = $request->only('question', 'explication');

        // Création du validateur avec les inputs nettoyés et les règles
        $validator = Validator::make($question, array(
                    'question' => 'string|required',
                    'explication' => 'string|required',
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

    public static function creerQuestionReponses($inputQuestion, $inputReponses, $identifiantQuiz) {

        // Créer question    
        $question = new QuestionQuiz();
        $question->description = $inputQuestion['question'];
        $question->explication = $inputQuestion['explication'];
        $question->save();
        
        // Créer réponses
        $compteur = 0;

        // Ajout des réponses liées
        foreach ($inputReponses['reponse'] as $reponse) {

            $objetReponse = new ReponseQuiz();

            // SI c'est la première réponse, alors on définit que c'est la bonne
            if ($compteur == 0) {
                $objetReponse->estBonneReponse = 1;
            }

            $objetReponse->description = $reponse;
            $objetReponse->questionQuizId = $question->id;

            $objetReponse->save();

            $compteur++;
        }

        // Création ligne dans la table intermédiaire entre quiz et question
        $questionQuizQuiz = new QuestionQuizQuiz();
        $questionQuizQuiz->questionQuizzes_id = $question->id;
        $questionQuizQuiz->quiz_id = $identifiantQuiz;
        $questionQuizQuiz->save();
        
    }

}
