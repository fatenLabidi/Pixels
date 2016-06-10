<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;


class Pays extends Model {

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
        'nom','nomCourt'
    ];

    /*
     * Retourne les regions qui appartiennent à un pays
     */

    public function regions() {
        return $this->hasMany('App\Models\Region');
    }

    /*
     * Retourne les utilisateurs originaires d'un pays
     */

    public function Utilisateurs() {
        return $this->hasMany('App\Models\Utilisateur');
    }

    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide($data = array()) {
        return Validator::make($data, array(
                    'nom' => 'unique:pays,nom|between:1,60|sometimes|required',
                    'nomCourt' => 'string|sometimes|required',
                ))->passes();
    }

}
