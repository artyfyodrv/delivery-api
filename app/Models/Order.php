<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'title',
        'receiver',
        'address_take',
        'address_delivery',
        'is_active',
        'is_deleted',
    ];

    public $timestamps = false;
}
