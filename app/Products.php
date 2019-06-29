<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $guarded = [];

    //Relationship

    public function stock()
    {
        return $this->hasOne('App\Stock', 'product_id','product_id');
    }

    public function inventory()
    {
        return $this->hasMany('App\Inventory', 'product_id', 'product_id');
    }

    public function sales()
    {
        return $this->hasMany('App\Sales', 'product_id', 'product_id');
    }

    public function returned()
    {
        return $this->hasMany('App\Returned', 'product_id', 'product_id');
    }
}
