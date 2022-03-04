<?php 

namespace App\Http\Repositories\PostRepository;

interface PostInterface
{

    public function store($params);
    
    public function get();

    public function update($params, $id);

    public function delete($id);

    public function deleteAllComments($id);

    public function filter($params);

    public function getPostAndComments($params);

}