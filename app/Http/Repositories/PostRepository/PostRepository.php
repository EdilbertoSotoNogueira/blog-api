<?php 

namespace App\Http\Repositories\PostRepository;

use App\Http\Repositories\PostRepository\PostInterface;
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

        $post->save();

    }


    public function get()
    {

        return Post::get()->where('users_id', Auth::id());

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


}