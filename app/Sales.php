<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $guarded = [];
    //Relationships

    public function product()
    {
        return $this->belongsTo('App\Products', 'product_id', 'product_id');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Invoices', 'invoice_no', 'invoice_no');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customers', 'customer_id', 'customer_id');
    }

    public function personnel()
    {
        return $this->belongsTo('App\Personnel', 'personnel_id', 'personnel_id');
    }

}
