<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;


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
        'nom'
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

    public static function estValide($data = array()) {
        return Validator::make($data, array(
                    'titre' => 'string|between:1,60|sometimes|required',
                    'contenu' => 'string|sometimes|required',
                    'estValide' => 'boolean|sometimes|required',
                ))->passes();
    }

}
