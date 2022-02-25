<?php

namespace App\Http\Repositories\CommentRepository;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\CommentRepository\CommentInterface;
use App\Models\Post;

class CommentRepository implements CommentInterface
{

    public function store($params)
    {

        $params = (Object) $params;

        $comment = new Comment();

        $comment->comments = $params->comments;

        $comment->users_id = Auth::id();

        $comment->posts_id = $params->id;

        return $comment->save();
        
    }

    
    public function get()
    {

        return  Comment::where('users_id', Auth::id())->get();
        
    }


    public function delete($id)
    {

        return Comment::where('id', $id)
                        ->where('users_id', Auth::id())
                        ->delete();

    }


    public function update($params, $id)
    {

        $update = Comment::where('id', $id)
                        ->where('users_id', Auth::id())
                        ->first();
        
        $update->comments = $params->comments != null ? $params->comments : $update->comments;

        return $update->save();

    }


}