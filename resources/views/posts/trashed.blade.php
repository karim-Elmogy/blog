@extends('layouts.app')



@section('content')
    <div class="jumbotron container mt-3 mb-5">
        <p>Your Can Show Trashed List</p>
        <a href="{{route('posts')}}" class="btn btn-primary " role="button">All Posts</a>
        <!-- <a href="{{route('posts.trashed')}}" class="btn btn-warning " role="button">Trash</a> -->


    </div>


    <div class="container">
        @if($post->count()>0)
            <table  class="table table-bordered" style="text-align: center;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Post Title</th>
                            <th scope="col">User Post</th>
                            <th scope="col">Post Date</th>
                            <th scope="col">Post Photo</th>
                            <th scope="col">Back</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $i=0;
                        @endphp
                        @foreach($post as $item)

                            <tr>
                                <th scope="row">{{++$i}}</th>
                                <td>{{$item->title}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->created_at->diffForhumans()}}</td>
                                <td><img src="{{URL::asset('images/posts/'.$item->photo)}}" alt="{{$item->photo}}" class="img-tumbnail" width="50" height="40"></td>
                                <td><a href="{{route('post.restore',$item->id)}}" class="btn btn-success">Back</a></td>
                                <td><a href="{{route('post.hdelete',$item->id)}}" class="btn btn-danger">Delete</a></td>


                            </tr>

                        @endforeach

                    </tbody>


                </table>
         @else
            <div class="col">
                    <div class="alert alert-danger" role="alert">
                        Empty Trash
                    </div>
            </div>

        @endif



    </div>





@endsection
