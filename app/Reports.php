<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    //Relationships
    public function personnel()
    {
        return $this->belongsTo('App\Personnel', 'personnel_id');
    }
}
