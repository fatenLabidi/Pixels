<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use View;
use App\Models\News;

class NewsCtrl extends Controller {

    /**
     * Affiche une liste des ressources
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = Categorie::all();

        foreach ($categories as $cat) {
            $nom[] = json_decode($cat->content_data);
        }


        return View::make('news/creer')
                        ->with('categories', $categories)
                        ->with('nom', $nom);
    }

    /**
     * Affiche le formulaire pour créer une nouvelle ressource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Conserve une ressource nouvellement créée dans la base de données
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validationNews= News::estValide($request);
        if ($validationNews->fails()) {
            return 'News non valide';
        }
        $newsValide = $validationNews->getData();
        var_dump($newsValide);


        // Tentative de sauvegarde de la fiche
        try {
            // Création de la news pour insertion dans BD
            $news = new News();
            $news->titre = $newsValide['titre'];
            $news->contenu = $newsValide['contenu'];
            $news->estValide = false;
            $news->categorieId = $newsValide['categorieId'];
            $news->save();
            echo 'News enregistrée ! ';
        } catch (\Exception $e) {
            // Retour en arrière en cas d'erreur
            DB::rollback();
            // Message d'erreur et renvoi sur le formulaire avec inputs
            echo 'Erreur base de données';
        }
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
