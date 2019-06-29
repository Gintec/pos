<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $guarded = [];
    //Relationships

    public function invoices()
    {
        return $this->hasMany('App\Invoices', 'customer_id', 'customer_id');
    }

    public function returned()
    {
        return $this->hasMany('App\Returned');
    }
}
