<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Expr\Isset_;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    public function getAllUsers(){
        $users = User::get();
        return response() -> json(['users' => $users],200);
    }

    public function getAnUser(User $user){
        return response() -> json(['user' => $user], 200);
    }
}
