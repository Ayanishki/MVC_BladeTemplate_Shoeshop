<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;
    protected $table="feedback";
    protected $primaryKey = 'FeedbackID';
    protected $fillable = [
        'CusID',
        'conment',
        'ProID',
        'image',
        'Vote',
        'Status',
        'created_at',
        'updated_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'ProID');
    }
    public function custom()
    {
        return $this->belongsTo(Product::class,'ProID');
    }
}
