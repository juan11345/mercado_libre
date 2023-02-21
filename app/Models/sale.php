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
        'customer_user_id',
        'admin_user_id',
        'product_id'
    ];

    public function Product(){
        return $this -> belongsTo(Product::class, 'product', 'id');
    }

    public function Admin(){
        return $this -> belongsTo(User::class, 'admin_user_product', 'id');
    }

    public function Customer(){
        return $this -> belongsTo(Product::class, 'customer_user_product', 'id');
    }
}
