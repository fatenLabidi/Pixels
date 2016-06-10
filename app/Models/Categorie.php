<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Categorie extends Model
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
        'nom'
    ];
    
    
    //Jointures 
    
    /*
     * Retourne toutes les news qui apprtiennent à une catégorie
     */
    public function news()
    {
        return $this->hasMany('App\Models\news')->withTimestamps();
    }
    
    /*
     * Retourne tous les quiz qui apprtiennent à une catégorie
     */
    public function quiz()
    {
        return $this->hasOne('App\Models\Quiz')->withTimestamps();
    }
    
    /*
     * Retourne tous les themes qui apprtiennent à une catégorie
     */
    public function themes()
    {
        return $this->hasMany('App\Models\Theme')->withTimestamps();
    }
    
    /* 
     * Permet de verifier si une catégorie existe dans la BD
     * @return bool true si l'e groupe'utilisateur a l'acces à un service 
     */
    public static function existe($id)
    {
        return self::find($id) !== null;
    }
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide($data = array())
    {
        return Validator::make($data,  array(
                'nom'           => 'unique:categories|sometimes|required',
            ))->passes();
    }
    
}
