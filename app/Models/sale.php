<?php

namespace App\Models;
use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function Product(){
        return $this -> belongsTo(Product::class, 'product', 'id');
    }

    public function User(){
        return $this -> belongsTo(Product::class, 'user_product', 'id');;
    }
}
