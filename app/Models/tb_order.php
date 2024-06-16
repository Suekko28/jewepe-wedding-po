<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_order extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'catalogue_id',
        'email',
        'phone_number',
        'wedding_date',
        'status',
        'user_id'

    ];
}
