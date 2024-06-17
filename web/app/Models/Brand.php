<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $primaryKey = 'BrandID';
    protected $table = 'brand';
    protected $fillable = [
        'BrandrName',
        'BrandrImage',
        'BrandrDescription',
        'updated_at',
        'created_at'
    ];
}
