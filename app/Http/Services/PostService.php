<?php

namespace App\Http\Services;

use App\Http\Repositories\PostRepository\PostRepository;

class PostService
{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {

        $this->postRepository = $postRepository;

    }


    public function create($params)
    {
    
        $this->postRepository->store($params);
            
    }


    public function get()
    {

        return $this->postRepository->get();

    }


    public function update($params, $id)
    {

        return $this->postRepository->update($params, $id);

    }
    


}