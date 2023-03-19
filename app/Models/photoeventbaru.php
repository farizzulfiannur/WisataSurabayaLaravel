<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photoeventbaru extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'eventphoto',
    ];

    public function eventbarus(){
        return $this->belongsTo(eventbaru::class);
    }
}
