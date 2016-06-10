<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class ServiceApplicatif extends Model
{
    use SoftDeletes;
    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    //Jointures 
    
    /*
     * Retourne les groupes qui ont accès à un service applicatif
     */
    public function groupes()
    {
        return $this->belongsToMany('App\Models\Groupe')->withTimestamps();
    }
 
    /*
     * Permet de valider le model 
     * 
     */
    public static function estValide($data = array())
    {
        return Validator::make($data,  array(
                'nom'           => 'unique:servicesApplicatifs|sometimes|required',
            ))->passes();
    }
}
