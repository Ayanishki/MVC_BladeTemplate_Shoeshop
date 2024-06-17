<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'provarid';
    protected $table = 'product_variants';
    protected $fillable = [
        'ProID',
        'ColorID',
        'SizeID',
        'quantity',
        'price',
        // 'moreimage',
        'status',
        'sku',
        'description',
        'created_at',
        'updated_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'ProID');
    }
    public function size()
    {
        return $this->belongsTo(Size::class,'SizeID');
    }

    public function color()
    {
        return $this->belongsTo(Color::class,'ColorID');
    }

}

