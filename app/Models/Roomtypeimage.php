<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtypeimage extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_type_id', 'img_src', 'img_alt'
    ];
}
