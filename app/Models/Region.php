<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;


class Region extends Model
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
        'nom', 'conseil', 'auteur'
    ];
    
    /*
     * Retourne le pays auquel appartient une region
     */

    public function pays() {
        return $this->belongsTo('App\Models\Pays');
    }
    
    /*
     * Retourne le pays auquel appartient une region
     */

    public function utilisateurs() {
        return $this->hasMany('App\Models\Utilisateurs');
    }
   
    /*
     * Permet de valider le model 
     */

    public static function estValide($data = array()) {
        return Validator::make($data, array(
                    'nom' => 'string|between:1,100|sometimes|required',
                ))->passes();
    }
}
