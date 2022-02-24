<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest\PostRequest;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    private $postService;

    public function __construct(PostService $postService)
    {

        $this->postService = $postService;
        
    }


    public function create(PostRequest $request)
    {

        try
        {

            $this->postService->create($request);

            return response()->json('Postagem criada com sucesso');
            
        }
        catch(\Exception $e)
        {

            return response()->json('Houve um erro no servidor'.$e->getMessage());

        }
            
    }


    public function get()
    {

        try
        {

            $list = $this->postService->get();
            
            return response()->json(['Listagem dos postagens',$list]);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


    public function update(Request $request, $id)
    {

        return $this->postService->update($request, $id);

    }


}