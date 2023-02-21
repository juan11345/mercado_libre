<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoLes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoLes;

    protected $table = 'users';


    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $appends = ['full_name'];

    protected $cats =[
        'created_ad' => 'datetime:Y-m-d',
		'updated_ad' => 'datetime:Y-m-d',
    ];

    public function getFullNameAttribute($value){
        return "{$this->name} {$this->last_name}";
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function UserSale(){
        return $this -> hasMany(Sale::class, 'user_product', 'id');
    }
}
