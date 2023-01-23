<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CommentInterface;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentInterface
{


    public function store($request)
    {
        try {


        $post=Post::find($request->id);
        Comment::create([
            'user_id'=>Auth::id(),
            'post_id'=>$post->id,
            'comment'=>$request->comment,
        ]);
        return redirect()->route('posts')->with('success','Comment added successfully');

        }catch(\Exception $ex){

        }
    }



    public function destroy($id)
    {
        try {
            $comment=Comment::find($id);
            $comment->delete();
            return redirect()->route('posts')->with('success','Comment Deleted successfully');

        }catch(\Exception $ex){

        }
    }


}
