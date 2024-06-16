<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tb_order extends Model
{
    use HasFactory;

    protected $table = 'tb_orders';

    protected $fillable = [
        'name',
        'catalogue_id',
        'email',
        'phone_number',
        'wedding_date',
        'status',
        'user_id'
    ];

    public function catalogue() : BelongsTo
    {
        return $this->belongsTo(tb_catalogues::class, 'catalogue_id', 'id');
    }
    
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}