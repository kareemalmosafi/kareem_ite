<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected   $fillable=[
        'status',
        'pay_status',
        'pharmacies_id',
        'warehouse_id',
        'content',


    ];
    public function warehouse()
    {
        return $this->belongsTo('App/Models/User','warehouse_id');
    }

    public function pharmacie()
    {
        return $this->belongsTo('App/Models/User','pharmacies_id');
    }
}
