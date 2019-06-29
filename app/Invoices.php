<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $guarded = [];
    //Relationships

    public function customers()
    {
        return $this->belongsTo('App\Customers', 'customer_id', 'customer_id');
    }

    public function sales()
    {
        return $this->hasMany('App\Sales', 'invoice_no', 'invoice_no');
    }

    public function returned()
    {
        return $this->hasMany('App\Returneds', 'invoice_no', 'invoice_no');
    }
    
}
