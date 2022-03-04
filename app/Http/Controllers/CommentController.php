<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest\CommentRequest;
use App\Http\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    private $commentService;


    public function __construct(CommentService $commentService)
    {

        $this->commentService = $commentService;

    }

    
    public function create(Request $request)
    {

        try
        {

            $this->commentService->create($request);
            
            return response()->json(['Comentário inserido com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


    public function get()
    {

        try
        {

            $comment = $this->commentService->get();

            return response()->json(['listagem dos comentários', $comment]);

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

            $this->commentService->delete($id);

            return response()->json(['Comentário excluido com sucesso']);

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

            $this->commentService->update($request, $id);

            return response()->json(['Comentário alterado com sucesso']);

        }
        catch(\Exception $e)
        {

            return response()->json(['Houve um erro no servidor']);

        }

    }


}
