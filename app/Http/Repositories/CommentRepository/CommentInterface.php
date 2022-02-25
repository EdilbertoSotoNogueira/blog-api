<?php

namespace App\Http\Repositories\CommentRepository;

interface CommentInterface
{

    public function store($params);

    public function get();

    public function delete($id);

    public function update($params, $id);

}