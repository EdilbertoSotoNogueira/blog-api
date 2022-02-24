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

            $comment = $this->commentService->create($request);
            
            return response()->json(['Comentário inserido com sucesso',$comment]);

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


}
