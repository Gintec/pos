<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];

    //Relationships

    public function supplier()
    {
        return $this->belongsTo('App\Suppliers', 'supplier_id', 'supplier_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Products', 'product_id', 'product_id');
    }
}
