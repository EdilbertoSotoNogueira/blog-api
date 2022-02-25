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


    public function delete($id)
    {

        return $this->commentRepository->delete($id);

    }


    public function update($params, $id)
    {

        return $this->commentRepository->update($params, $id);

    }


}