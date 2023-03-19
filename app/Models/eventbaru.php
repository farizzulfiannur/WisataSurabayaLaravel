<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventbaru extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_location',
        'tanggal_mulai',
        'tanggal_akhir',
        'event_desc',
        'event_cover',
    ];

    public function photoeventbarus(){
        return $this->hasMany(photoeventbaru::class);
    }
}
