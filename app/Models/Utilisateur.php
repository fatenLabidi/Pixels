<?php
/**
 * Modèle utilisateur
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utilisateur extends Model
{
    use SoftDeletes;
    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];
    public $hidden = ['motDePasse'];
    
    //Jointures 
    
    /*
     * Retourne les groupes auxquels appartient un utilisateur
     */
    public function groupes()
    {
        return $this->belongsToMany('App\Models\Groupe')->withTimestamps();
    }
    
    /*
     * Retourne le pays d'un utilisateur
     */
    public function pays()
    {
        return $this->hasOne('App\Models\Pays')->withTimestamps();
    }
    
    /*
     * Retourne la question seceret d'un utilisateur
     */
    public function questionSecrete()
    {
        return $this->hasOne('App\Models\QuestionSecrete')->withTimestamps();
    }
    
    /*
     * Retourne la region d'un utilisateur
     */
    public function region()
    {
        return $this->hasOne('App\Models\Region')->withTimestamps();
    }
    
    /*
     * Retourne la reponse secrete d'un utilisateur
     */
    public function responsesSecretes()
    {
        return $this->hasMany('App\Models\ResponseSecretes')->withTimestamps();
    }
    
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide($data = array())
    {
        return Validator::make($data,  array(
                'pseudo'           => 'unique:utilisateurs|sometimes|required',
                'motDePasse'       => 'string|between:1,100|sometimes|required',
                'anneNaissance'    => 'date|between:1,60|sometimes|required',
                'sexe'             => 'string|between:1,20|sometimes|required',
                'email'            => 'email|between:3,60|sometimes|required',
                'reponseQuestionSecrete'=> 'string|sometimes|required',
                'paysId'           => 'exists:pays,id|sometimes|required',
                'regionId'         => 'exists:regions,id|sometimes|required',
                'questionSecreteId'=> 'exists:questionsSecretes,id|sometimes|required',
            ))->passes();
    }
    
}
