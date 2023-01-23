<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CommentInterface;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface=$commentInterface;
    }



    public function store(Request $request)
    {
        return $this->commentInterface->store($request);
    }




    public function destroy($id)
    {
        return $this->commentInterface->destroy($id);
    }

}
