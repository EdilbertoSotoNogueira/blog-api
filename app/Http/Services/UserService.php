<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        
        $this->userRepository = $userRepository;

    }


    public function create($request)
    {

        $this->userRepository->create($request);

    }
        

    public function login($request)
    {

        $user = $this->userRepository->login($request);
        
        $token = $user->createtoken('auth_token')->plainTextToken;

        return response()->json([

            'access_token' => $token,
            'token_type'   => 'Bearer'

        ]);

    }


}