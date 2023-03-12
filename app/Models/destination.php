<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    use HasFactory;

    public function destPhoto(){
        return $this->hasMany(dest_photo::class);
    }

    protected $fillable = [
        'dest_name',
        'dest_id',
        'dest_category',
        'dest_location',
        'dest_desc',
    ];
}
