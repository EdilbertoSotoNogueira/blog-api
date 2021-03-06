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


    public function delete($id)
    {

        $this->postRepository->deleteAllComments($id);
        return $this->postRepository->delete($id);

    }


    public function filter($params)
    {

        return $this->postRepository->filter($params);

    }


    public function getPostAndComments($params)
    {

        return $this->postRepository->getPostAndComments($params);
            
    }
    


}