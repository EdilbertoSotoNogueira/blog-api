<?php 

namespace App\Http\Services;

use App\Http\Repositories\CommentRepository\CommentRepository;

class CommentService
{

    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        
        $this->commentRepository = $commentRepository;

    }

    
    public function create($params)
    {

        return $this->commentRepository->store($params);

    }


    public function get()
    {

        return $this->commentRepository->get();

    }


}