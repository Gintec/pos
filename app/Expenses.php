<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    //Relationships

    public function personnel()
    {
        return $this->hasMany('App\Personnel');
    }
}
