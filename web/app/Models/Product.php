<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProID';
    protected $table = 'product';
    protected $fillable = [
        'ProID',
        'CatID',
        'metatitle',
        'ProName',
        'prodescription',
        'ProImage',
        'Price',
        'created_at',
        'tags',
        'moreimage',
        'createdby',
        'status',
        'inventory',
        'sold',
        'updated_at'
    ];
    public function variants()
    {
        return $this->hasMany(ProductVariant::class,'ProID');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class,'CatID');
    }
    public function cartdetail()
    {
        return $this->hasMany(CartDetail::class,'ProID','ProID');
    }
    public function orderdetail()
    {
        return $this->hasMany(Product::class, 'ProID', 'ProID');
    }

}

