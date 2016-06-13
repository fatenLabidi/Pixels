<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class News extends Model {
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
        'titre','contenu','estValide', 'categorieId',
    ];

    //Jointures 

    /*
     * Retourne les catégories auxquels appartient une news
     */
    public function categories() {
        return $this->belongsToMany('App\Models\Categorie')->withTimestamps();
    }

    /*
     * Retourne les modifications qui concernent une news
     */

    public function modification() {
        return $this->belongsToMany('App\Models\Modification')->withTimestamps();
    }

    /*
     * Permet de valider le model 
     * 
     */

    public static function estValide(Request $request) {
        
        $news = $request->only('titre', 'contenu','categorieId');
        
        //Validateur
        $validator = Validator::make($news, array(
                    'titre' => 'string|between:1,60|sometimes|required',
                    'contenu' => 'string|sometimes|required',
                    'categorieId' => 'string|sometimes|required',
                ));
        return $validator;
    }

}
