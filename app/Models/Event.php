<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_location',
        'tanggal_mulai',
        'tanggal_akhir',
        'event_desc',
        'event_cover',
        'event_penyelenggara'
    ];

    public function photoevents(){
        return $this->hasMany(photoevent::class);
    }
}
