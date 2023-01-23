@extends('layouts.app')



@section('content')
    <div class="jumbotron container mt-3 mb-5">
        <p>Your Can Create Post into List</p>
        <a href="{{route('post.create')}}" class="btn btn-primary " role="button">Create Post</a>
        <a href="{{route('posts.trashed')}}" class="btn btn-warning " role="button">Trash Post</a>


    </div>
    <div class="container">
        @if($posts->count() > 0)
            @foreach($posts as $item)

                <div class="card p-4 mb-5" style="width: 30rem; margin: auto">
                    <div class="row">
                        <div class="col">
                            <h5>{{$item->user->name}}</h5>
                        </div>

                        <div class="col">
                            @if($item->user_id == Auth::id())
                                <div class="row">
                                    <div class="col">
                                        <span style="font-size: 12px">{{$item->created_at->diffForhumans()}}</span>

                                    </div>
                                    <div class="col">
                                        <a href="{{route('post.edit',$item->id)}}" class=" text-success ">Edit</a>
                                        <a href="{{route('post.destroy',$item->id)}}" class=" text-warning pl-2">Delete</a>
                                    </div>

                                </div>
                            @else

                            @endif
                        </div>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                    </div>
                    <img src="{{URL::asset('images/posts/'.$item->photo)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        {{$item->content}}<br>
                        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                            Add Comment
                        </button>
                    </div>

                    <div class="card-body">
                        @foreach($item->comments as $comment)
                            <div class="row">
                                <div class="col">
                                    <span class="text-primary">{{Auth::user()->name}}</span><br>
                                    <div class="mr-2">{{$comment->comment}}</div><br>
                                </div>
                                <div class="col">
                                    <span style="font-size: 12px ; margin-right: 30px">{{$comment->created_at->diffForhumans()}}</span>
                                    @if($comment->user_id == Auth::id())
                                        <a href="{{route('comment.destroy',$comment->id)}}" class=" text-danger">Delete</a>
                                    @else

                                    @endif
                                </div>
                            </div>

                        @endforeach
                    </div>


                </div>



                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input id="id" type="hidden" name="id" class="form-control"
                                           value="{{ $item->id }}">
                                    <div class="form-group mb-4">
                                        <label for="">Comment : </label>
                                        <input type="text" name="comment" id="" class="form-control" placeholder="Please Enter Your Comment ....">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @else
            No Posts
        @endif

    </div>






@endsection
