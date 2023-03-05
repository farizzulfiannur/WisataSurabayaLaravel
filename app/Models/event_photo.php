<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_photo extends Model
{
    use HasFactory;

    public function eventPhoto(){
        return $this->hasMany(event::class);
    }

    protected $fillable = [
        'event_photo1',
        'event_photo2',
        'event_photo3',
    ];
}
