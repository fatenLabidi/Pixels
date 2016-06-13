<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Fiche extends Model
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
        'titre', 'contenu', 'estValide','themeId'
    ];
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
        return $this->belongsToMany('App\Models\Modification')->withTimestamps();
    }
    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide(Request $request)
    {
        $fiche = $request->only('titre', 'contenu','themeId');
        
        // Création du validateur
        $validator = Validator::make($fiche, array(
            'titre' => 'string|required',
            'contenu' => 'string|required',
            'themeId' => 'int|required',
        ));
        return $validator;
    }
}
