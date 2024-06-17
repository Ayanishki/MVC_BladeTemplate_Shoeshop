<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'cartdetail';
    protected $primaryKey = 'CartDetailID';
    protected $fillable = [
        'CartID',
        'ProID',
        'Quantity',
        'Price',
        'created_at',
        'updated_at',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'CartID', 'CartID');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProID', 'ProID');
    }
}
