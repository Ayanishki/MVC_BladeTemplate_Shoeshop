<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="category";
    protected $primaryKey = 'CatID';
    protected $fillable = [
        'catname',
        'title',
        'description',
        'image',
        'created_at',
        'updated_at'
    ];
    public function product()
    {
        return $this->hasMany(Product::class,'CatID');
    }
}
