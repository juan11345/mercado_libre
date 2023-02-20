<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'descryption',
        'price',
        'stock'
    ];

    public function Category(){
		return $this -> belongsTo(Category::class, 'category_id', 'id');
	}

    public function Sales(){
        return $this -> hasMany(Sales::class, 'product_id', 'id');
    }
}
