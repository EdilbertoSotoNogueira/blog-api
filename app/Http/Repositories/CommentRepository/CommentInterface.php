<?php

namespace App\Http\Repositories\CommentRepository;

interface CommentInterface
{

    public function store($params);

    public function get();

}