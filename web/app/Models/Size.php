<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $primaryKey = 'SizeID';
    protected $table = 'size';
    protected $fillable = [
        'SizeName',
        'updated_at',
        'created_at'
    ];
    public function product_variant()
    {
        return $this->hasMany(ProductVariant::class,'SizeID');
    }

}
