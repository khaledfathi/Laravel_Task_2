<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_classified extends Model
{
    use HasFactory;
    public $table = 'products_classified';
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'product_id',
        'user_id'
    ];
}
