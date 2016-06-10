<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class QuestionSecrete extends Model
{
    use SoftDeletes;
    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * les attributs qu'on peut assigner au model.
     * @var array
     */
    protected $fillable = [
        'description'
    ];

    /*
     * Retourne les reponses utilisateur qui contiennent
     * une question
     */

    public function utilisateurs() {
        return $this->hasMany('App\Models\Utilisateur');
    }
    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide($data = array()) {
        return Validator::make($data, array(
                    'description' => 'string|sometimes|required',
                ))->passes();
    }
    
}
