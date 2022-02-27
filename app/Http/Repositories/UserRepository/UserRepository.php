<?php

namespace App\Http\Repositories\UserRepository;

use App\Http\Repositories\UserRepository\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface
{


    public function create($params)
    {

        $params = (Object) $params;

        $user = new User();

        $user->name     = $params->name;
        $user->email    = $params->email;
        $user->password = bcrypt($params->password);

        return $user->save();

    }


    public function login($params)
    {
 
        $params = (Object) $params;

        return User::where('email', $params->email)->firstorfail();
        
    }


    public function logout()
    {

        return Auth::user()->tokens()->delete();

    }

        
}