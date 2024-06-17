<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $primaryKey = 'CartID';
    protected $fillable = [
        'UserID',
        'Status',
        'created_at',
        'updated_at'
    ];

    public function details()
    {
        return $this->hasMany(CartDetail::class, 'CartID', 'CartID');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }
}

