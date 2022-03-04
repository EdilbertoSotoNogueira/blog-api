<?php 

namespace App\Http\Repositories\PostRepository;

use App\Http\Repositories\PostRepository\PostInterface;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostInterface
{

    public function store($params)
    {

        $params = (Object) $params;

        $post = new Post();

        $post->title     = $params->title;
        $post->post_body = $params->post_body;
        $post->users_id  = Auth::id();

        return $post->save();

    }


    public function get()
    {

        return Post::where('users_id', Auth::id())->get();

    }


    public function update($params, $id)
    {

        $update = Post::where('users_id', Auth::id())
                        ->where('id', $id)
                        ->first();

   
        $update->title = $params->title != null ? $params->title : $update->title;
        $update->post_body = $params->post_body != null ? $params->post_body : $update->post_body;

        return $update->save();

    }


    public function delete($id)
    {

        return Post::where('id', $id)
                    ->where('users_id', Auth::id())
                    ->delete();

    }


    public function deleteAllComments($id)
    {

        return Comment::where('posts_id', $id)
                        ->delete();

    }


    public function filter($params)
    {

        return Post::where('title', 'like', '%'.$params->title.'%')
                    ->where('post_body', 'like', '%'.$params->post_body.'%')
                    ->get();

    }


    public function getPostAndComments($params)
    {

        return Post::where('id', $params->id)
                    ->get();

    }
    

}