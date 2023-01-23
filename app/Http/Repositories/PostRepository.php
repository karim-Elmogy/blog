<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PostInterface;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostInterface
{

    public function index()
    {


        $comments =Comment::orderBy('created_at','DESC')->get();

        $posts =Post::orderBy('created_at','DESC')->with(['comments' => function ($q) {
        $q->select('id','comment', 'user_id', 'post_id','created_at');
        }])->get();
        return view('posts.index',compact('posts','comments'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store($request)
    {

        try {


            $fileName = "";
            if ($request->has('photo')) {

                $fileName = uploadImage('posts', $request->photo);
            }
            Post::create([
                'user_id'=>Auth::id(),
                'author'=>Auth::user()->name,
                'title'=>  $request->title,
                'content'=>$request->content,
                'photo'=>$fileName ,
                'slug'=> str_slug($request->slug)
            ]);
            return redirect()->route('posts')->with('success','Post added successfully');

        }catch(\Exception $ex){

        }

    }




    public function edit( $id)
    {
        $post =Post::where('id',$id)->where('user_id',Auth::id())->first();
        if(!$post){
            return redirect()->back();
        }
        return view('posts.edit')->with('post',$post);
    }

    public function update($request)
    {
        try {

            $post =Post::find( $request->id);


            if ($request->has('photo')) {
                $fileName = uploadImage('posts', $request->photo);
                $post->photo=$fileName;
            }

            $post->title=$request->title;
            $post->content=$request->content;
            $post->save();


            return redirect()->route('posts')->with('success','Update is success');

        }catch(\Exception $ex){

        }


    }

    public function destroy($id)
    {
        try {



        $post =Post::where('id',$id)->where('user_id',Auth::id())->first();
        if(!$post){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->back()->with('success','Post Delete successfully');
         }catch(\Exception $ex){

        }
    }


    public function postsTrashed()
    {
        $post =Post::onlyTrashed()->where('user_id',Auth::id())->latest()->get();
        return view('posts.trashed')->with('post',$post);
    }

    public function hdelete( $id)
    {
        try {
            $post =Post::onlyTrashed()->where('id',$id)->where('user_id',Auth::id())->first();
            if(!$post){
                return redirect()->back();
            }
            $post->forceDelete();
            return redirect()->back()->with('success','Post Delete successfully');
        }catch(\Exception $ex){

        }

    }

    public function restore( $id)
    {
        try {


        $post =Post::onlyTrashed()->where('id',$id)->where('user_id',Auth::id())->first()->restore();
        if(!$post){
            return redirect()->back();
        }
        return redirect()->back()->with('success','Post Backed successfully');
         }catch(\Exception $ex){

        }
    }

}
