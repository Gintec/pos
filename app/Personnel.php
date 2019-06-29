<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $guarded = [];
    //Relationships
    public function user()
    {
        return $this->belongsTo('App\User', 'personnel_id', 'user_id');
    }

    public function spent_by()
    {
        return $this->belongsTo('App\Expenses');
    }

    public function returned()
    {
        return $this->hasMany('App\Returneds', 'collected_by', 'personnel_id');
    }

    public function personnel()
    {
        return $this->hasMany('App\Sales', 'personnel_id', 'personnel_id');
    }
}
