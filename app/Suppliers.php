<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $guarded = [];
    //Relations
    public function inventory()
    {
        return $this->hasMany('App\Inventory', 'supplier_id', 'supplier_id');
    }
}
