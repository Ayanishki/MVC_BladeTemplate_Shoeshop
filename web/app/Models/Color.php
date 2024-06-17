<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $primaryKey = 'ColorID';
    protected $table = 'color';
    protected $fillable = [
        'ColorName',
        'updated_at',
        'created_at'
    ];
    public function product_variant()
    {
        return $this->hasMany(ProductVariant::class,'ColorID');
    }

}


