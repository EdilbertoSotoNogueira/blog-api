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
            
            return $list;

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


    public function update(Request $request, $id)
    {

        try
        {

            $this->postService->update($request, $id);

            return response()->json(['Postagem alterada com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }


    }


    public function delete($id)
    {

        try
        {

            $this->postService->delete($id);

            return response()->json(['Post Deleteado com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


    public function filter(Request $request)
    {

        try
        {

            $list = $this->postService->filter($request);

            return response()->json([$list]);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


}