<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    public function eventPhoto(){
        return $this->hasMany(event_photo::class);
    }

    protected $fillable = [
        'event_name',
        'event_id',
        'event_location',
        'tanggal_mulai',
        'tanggal_akhir',
        'penyelenggara',
        'event_dest',
    ];
}
