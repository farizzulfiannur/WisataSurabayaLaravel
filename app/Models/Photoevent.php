<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photoevent extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'eventphoto',
        'event_id',
    ];
    public function events(){
        return $this->belongsTo(event::class);
    }
}
