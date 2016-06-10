<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Http\Requests;
use App\Lib\Message;
use Illuminate\Http\Request;
//use Request;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;
use App\Models\QuestionQuiz;
use App\Models\ReponseQuiz;
use View;

class QuizCtrl extends Controller {

    /**
     * Affiche une liste des ressources
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Affiche le formulaire pour créer une nouvelle ressource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('quiz/creer');
    }

    /**
     * Conserve une ressource nouvellement créée dans la base de données
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validationQuiz = Quiz::estValide($request);

        if ($validationQuiz->fails()) {
            return 'Informations quiz non valides';
        }

        // On récupère les inputs validés
        $quizValide = $validationQuiz->getData();


        $quiz = new Quiz();
        $quiz->nom = $quizValide['nom'];
        $quiz->conseil = $quizValide['conseil'];
        $quiz->auteur = 1;
        $quiz->categorieId = 1;

        $quiz->save();


        // Retourne à la vue de création d'une question, donne l'id du Quiz
        //
        //return redirect()->route('afficherQuiz', [$quiz->id]); 
        //return redirect()->route('quiz/creer', [$quiz->id]); 
        //return redirect()->route('quiz/afficher', [$quiz->id]);
        //
        return View::make('quiz/creerQuestion')->with('identifiantQuiz', $quiz->id);
        //return view('home');
        //return view('afficherQuiz/{2}'); //, ['identifiantQuiz' => $quiz->id]);
    }

    /**
     * Affiche la ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('home');
        /*
        $quiz = Quiz::find($id);
        if (!isset($quiz)) {
            return response('no content', 204);
        }
        return response($quiz, 200, array('Content-Type' => 'application/json'));
         * 
         */
    }

    /**
     * Affiche le formulaire pour modifier la ressource spécifiée
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Met à jour la ressource spécifiée dans la base de données
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Supprime la ressource spécifiée de la base de données
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
