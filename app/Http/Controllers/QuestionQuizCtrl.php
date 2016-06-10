<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Lib\Message;
use Illuminate\Http\Request;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\QuestionQuiz;
use App\Models\Quiz;

class QuestionQuizCtrl extends Controller {

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
    public function create($id) {
        return view('quiz/creerQuestion');
    }

    /**
     * Conserve une ressource nouvellement créée dans la base de données
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        // récupérerer identifiant quiz
        $identifiantQuiz = Request::only('identifiantQuiz');
        
        // Vérifier existence quiz et pas encore validé
        $validationQuiz = Quiz::existe($identifiantQuiz);
        
        
        $validationQuestion = QuestionQuiz::estValide($request);
        
        if($validationQuestion->fails()) {
            return 'Pas de question :\'(';
        }
        
        $validationReponses = ReponseQuiz::estValide($request);
        
        if($validationReponses->fails()) {
            return 'Pas de réponse :\'(';
        }
        
        $questionValide = $validationQuestion->getData();
        
        // Début de la transaction
        DB::beginTransaction();
        try {
            // On tente de créer la question et ses réponses
            QuestionQuiz::creer($questionValide);
            
            // Si pas d'erreur, on "valide" la création
            DB::commit();
            
            // Message de succès, puis renvoi sur le formulaire de création
            //Message::success('commande.created');
            //return redirect('commande');
            echo 'ça marche !';
        } catch (\Exception $e) {
            // Si une erreur survient, on "annule" la création
            DB::rollback();
            // Message d'erreur, puis renvoi sur le formulaire avec inputs
            //Message::error('bd.error', ['error' => $e->getMessage()]);
            //return redirect()->back()->withInput();
            echo 'Bug à la création ...';
        }
        
        //$inputQuestionReponses = Request::only('question', 'reponse');
        //$inputReponses = Request::only('reponse');

        /*
        // Compte le nombre de réponses données par l'utilisateur
        $count = 0;
        foreach ($inputQuestionReponses['reponse'] as $reponses) {
            foreach ($reponses as $reponse) {
                if ($reponse != null) {
                    $count++;
                }
            }
        }

        if ($count < 2) {
            echo 'Pas assez de réponses.';
        }*/
        
        //$validation = QuestionQuiz::estValide($inputQuestionReponses);
    }

    /**
     * Affiche la ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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
