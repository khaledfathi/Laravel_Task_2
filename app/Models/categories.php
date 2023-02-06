<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    public $timestamps = false; 
    public $table = 'categories'; 
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];


}
