<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returned extends Model
{
    protected $guarded = [];
    
    //Relationships
    public function sales()
    {
        return $this->hasMany('App\Sales', 'item_id', 'item_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Products', 'product_id', 'product_id');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice', 'invoice_no');
    }

    public function personnel()
    {
        return $this->hasMany('App\Personnel', 'personnel_id', 'collected_by');
    }
}
