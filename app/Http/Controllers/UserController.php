<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest\CreateRequest;
use App\Http\Requests\UserRequest\LoginRequest;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    private $userService;

    
    public function __construct(UserService $userService)
    {
        
        $this->userService = $userService;

    }


    public function create(CreateRequest $request)
    {

        try
        {

            $this->userService->create($request);

            return response()->json(['Usuário cadastrado com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


    public function login(LoginRequest $request)
    {

        try
        {

            if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {

                return response(['email ou senha invalídos']);

            }

            $login = $this->userService->login($request);

            return response()->json(['Logado com sucesso',$login]);

        }
        catch(\Exception $e)
        {

            return response()->json('Houve um erro no servidor');
            
        }

    }


}