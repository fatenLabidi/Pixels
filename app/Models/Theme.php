<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Theme extends Model
{
    use SoftDeletes;
    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    //Jointures 
    
    /*
     * Retourne les fiches d'un thème
     */
    public function fiches()
    {
        return $this->hasMany('App\Models\Fiche')->withTimestamps();
    }
    
    /*
     * Retourne la categorie d'un thème
     */
    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie')->withTimestamps();
    }
 
    /*
     * Permet de valider le model 
     */
    public static function estValide($data = array())
    {
        return Validator::make($data,  array(
                'nom'           => 'unique:themes|sometimes|required',
            ))->passes();
    }
}
