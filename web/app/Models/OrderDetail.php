<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';
    protected $primaryKey = 'OrdtID';
    protected $fillable = [
        'OrdID',
        'ProID',
        'Quantity',
        'Price',
        'created_at',
        'updated_at'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'OrdID', 'OrdID');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProID', 'ProID');
    }
}

