<?php 

namespace App\Http\Repositories\PostRepository;

interface PostInterface
{

    public function store($params);
    
    public function get();

    public function update($params, $id);

}