<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    public function regions()
    {
        return $this->hasMany('Region');
    }
    
    public function Utilisateurs()
    {
        return $this->belongsToMany('Utilisateur');
    }
}
