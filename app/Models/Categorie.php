<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use SoftDeletes;
    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];
    
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
        return $this->hasOne('App\Models\Theme')->withTimestamps();
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
