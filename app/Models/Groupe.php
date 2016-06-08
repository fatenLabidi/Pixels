<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model {

    public function utilisateurs() {
        return $this->belongsToMany('App\Models\Utilisateur')->withTimestamps();
    }

    public function servicesApplictaifs() {
        return $this
                        ->belongsToMany('App\Models\ServiceApplicatif')
                        ->withPivot('acces')
                        ->withTimestamps();
    }

    
    public function hasRole($role, $resrc) {
        
        if ($service instanceof ServiceApplicatif) {
            $service = $service->nom;
        }
        $services = $this->services->where('nom', $service);
        foreach ($services as $service) {
            if ($service->pivot->acces == $acces) {
                return true;
            }
        }
        return false;
    }

}
