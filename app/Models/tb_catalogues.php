<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_catalogues extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'package_name',
        'description',
        'price',
        'status_publish',
    ];
}
