<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tb_catalogues extends Model
{
    use HasFactory;

    protected $table = 'tb_catalogues';

    protected $fillable = [
        'image',
        'package_name',
        'description',
        'price',
        'status_publish',
        'user_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order() : HasMany
    {
        return $this->hasMany(tb_order::class, 'catalogue_id', 'id');
    }
}