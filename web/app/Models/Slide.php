<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $primaryKey = 'slideid';
    protected $table = 'slide';
    protected $fillable = [
        'title',
        'description',
        'image',
        'created_at',
        'updated_at'
    ];

}

