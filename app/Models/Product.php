<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected   $fillable=[
        'name_scientific',
        'name_trade',
        'type',
        'company',
        'quantity',
        'ex_date',
        'price',
        'warehouse_id',
    ];
    public function warehouse()
    {
        return $this->belongsTo('App/Models/User');
    }
}
