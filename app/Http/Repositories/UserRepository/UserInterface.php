<?php 

namespace App\Http\Repositories\UserRepository;

interface UserInterface
{

    public function create($params);

    public function login($params);

    public function logout();

}