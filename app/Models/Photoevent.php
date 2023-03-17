<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photoevent extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'eventphoto',
    ];

    public function events(){
        return $this->belongsTo(event::class);
    }
}
