<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use App\Models\Fiche;
use App\Models\Theme;
use View;

class FicheCtrl extends Controller {

    /**
     * Affiche une liste des ressources
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

//        $categories = Categorie::all();
//        return view('fiche/creer', ['categories' => json_decode($categories, true)]);
        $categories = Categorie::all();

        foreach ($categories as $cat) {
            $nom[] = json_decode($cat->content_data);
        }


        return View::make('fiche/creer')
                        ->with('categories', $categories)
                        ->with('nom', $nom);
    }

    /**
     * Affiche le formulaire pour créer une nouvelle ressource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
    }
    
    
    public function listeThemes(Request $request){
        $catId = $request->only('categorieId');
        $themes = Theme::where('categorieId',1)->first();
//        foreach ($themes as $theme) {
//            $nom[] = json_decode($theme->nom->first());
//        }
        var_dump(json_decode($themes));
        return themes;
    }

    /**
     * Conserve une ressource nouvellement créée dans la base de données
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //var_dump($request);
        $validationFiche = Fiche::estValide($request);
        if ($validationFiche->fails()) {
            return 'Fiche non valide';
        }
        $ficheValide = $validationFiche->getData();
        

        // Tentative de sauvegarde de la fiche
        try {
            // Création de la fiche pour insertion dans BD
            $fiche = new Fiche();
            $fiche->titre = $ficheValide['titre'];
            $fiche->contenu = $ficheValide['contenu'];
            $fiche->estValide = false;
            $fiche->themeId = $ficheValide['themeId'];
            $fiche->save();
            echo 'Fiche enregistrée ! ';
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
