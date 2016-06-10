<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Modification extends Model
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
        'auteur'
    ];
    
    /*
     * Retourne tous les fiches concernées par une modificatio 
     */
    public function fiches() {
        return $this->belongsToMany('App\Models\Fiche')->withTimestamps();
    }  

    /*
     * Retourne tous les fiches concernées par une modificatio 
     */
    public function news() {
        return $this->belongsToMany('App\Models\News')->withTimestamps();
    }  
    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide($data = array())
    {
        return Validator::make($data,  array(
                'auteur'  => 'exists:utilisateurs,id|sometimes|required',
            ))->passes();
    }
}
