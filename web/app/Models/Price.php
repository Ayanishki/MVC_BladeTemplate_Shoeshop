<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $primaryKey = 'PriID';
    protected $table ='price';
    protected $fillable = [
        'PriID',
        'Cost'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProID', 'ProID');
    }
}
