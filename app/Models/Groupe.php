<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Groupe extends Model {
    
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
    /*
     * Retourne tous les utilisateurs qui appartiennent à un groupe
     */
    public function utilisateurs() {
        return $this->belongsToMany('App\Models\Utilisateur')->withTimestamps();
    }

    /*
     * Retourne tous les services applicatifs accessibles par un groupe
     */
    public function servicesApplictaifs() {
        return $this->belongsToMany('App\Models\Utilisateur')->withTimestamps();
    }
    
    /* 
     * Permet de verifier si le groupe a un droit spécifique 
     * @return bool true si le groupe a l'acces à un service 
     */
    public function aAcces($service)
    {
        $acces = Acces::where('groupeId','=',$this->id);
        $service= $acces->ServiceApplicatif()->where('nom','=',$service)->first();
        // Verifie que le groupe a acces au service applicatif
        return isset($service);
    }
    
    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide($data = array())
    {
        return Validator::make($data,  array(
                'nom'  => 'unique:groupes|sometimes|required',
            ))->passes();
    }
}
