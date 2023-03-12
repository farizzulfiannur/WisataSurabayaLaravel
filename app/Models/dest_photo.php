<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dest_photo extends Model
{
    use HasFactory;

    public function destination(){
        return $this->belongsTo(destination::class);
    }
    protected $fillable = [
        'dest_photo1',
        'dest_photo2',
        'dest_photo3',
    ];
}
