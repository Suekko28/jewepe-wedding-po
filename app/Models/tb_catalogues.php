<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tb_catalogues extends Model
{
    use HasFactory;

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
        return $this->BelongsTo(User::class, 'user_id' ,'id');
    }
}
