<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_code',
        'book_ids',
        'status',
        'borrowed_at',
        'due_at',
        'returned_at',
        'notes',
    ];

    protected $casts = [
        'book_ids' => 'array',
        'borrowed_at' => 'datetime',
        'due_at' => 'datetime',
        'returned_at' => 'datetime',
    ];

    // Automatically generate a UUID for order_code when creating
    protected static function booted()
    {
        static::creating(function ($order) {
            do {
                $code = 'BR-' . random_int(10000, 99999);
            } while (self::where('order_code', $code)->exists());

            $order->order_code = $code;
        });
    }


    // Relationship: Order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
