<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function pays()
    {
        return $this->belongsTo('Pays');
    }
}
