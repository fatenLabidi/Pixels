<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use SoftDeletes;
    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    //Jointures 
    
    /*
     * Retourne le thème auquel appartient une fiche
     */
    public function theme ()
    {
        return $this->belongsTo('App\Models\Theme')->withTimestamps();
    }
    
    /*
     * Retourne les modifications qui concernent une fiches
     */
    public function modification()
    {
        return $this->belongsTo('App\Models\Modification')->withTimestamps();
    }
    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide($data = array())
    {
        return Validator::make($data,  array(
                'titre'           => 'string|between:1,60|sometimes|required',
                'contenu'         => 'string|sometimes|required',
                'estValide'       => 'boolean|sometimes|required',
                'themeId'         => 'exists:themes,id|sometimes|required'
            ))->passes();
    }
}
