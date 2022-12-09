<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['name', 'price', 'quantity', 'removed', 'product_id'];
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
