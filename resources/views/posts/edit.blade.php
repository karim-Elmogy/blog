@extends('layouts.app')

@section('content')


    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="diaplay-4">Eidt Post</h1>
            <a href="{{route('posts')}}" class="btn btn-primary " role="button">All Posts</a>
        </div>
    </div>



    <div class="container mt-5">
        @php

        @endphp
        <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="">Title : </label>
                <input type="text" name="title" id="" class="form-control" value="{{$post->title}}">
                @if ($errors->has('title'))
                    <li class="text-danger">{{ $errors->first('title') }}</li>
                @endif
            </div>
            <div class="form-group mb-4">
                <label for="">Photo : </label>
                <input type="file" name="photo" id="" class="form-control" value="{{$post->photo}}">
                <img src="{{URL::asset('images/posts/'.$post->photo)}}" style="width: 150px;height: 100px;padding: 10px" class="card-img-top" alt="...">
                @if ($errors->has('photo'))
                    <li class="text-danger">{{ $errors->first('title') }}</li>
                @endif
            </div>

            <div class="form-group">
                <label for="">Content : </label>
                <textarea class="form-control" name="content" id="" cols="30" rows="5">{!!$post->content!!}</textarea>
            </div>
            @if ($errors->has('content'))
                <li class="text-danger">{{ $errors->first('title') }}</li>
            @endif
            <button type="submit" class="btn btn-primary mt-5">Update</button>
        </form>
    </div>

@endsection
