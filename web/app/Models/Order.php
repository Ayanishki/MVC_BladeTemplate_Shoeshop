<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'OrdID';
    protected $fillable = [
        'UserID',
        'ReceivingName',
        'OrderDate',
        'Status',
        'ReceivingAddress',
        'ReceivingPhone',
        'MoneyTotal',
        'Note',
        'ReceivingEmail',
        'Payment',
        'created_at',
        'updated_at',
        'Discount'
    ];

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class, 'OrdID', 'OrdID');
    } 
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    } 
   
}

