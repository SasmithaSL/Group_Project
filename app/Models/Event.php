<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Define fillable properties for mass assignment
    protected $fillable = [
        'topic',
        'description',
        'event_date',
        'start_time',
        'end_time',
        'venue',
        'image'
    ];
    
    // You can add relationships or other methods here
}
