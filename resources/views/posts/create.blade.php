@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="diaplay-4">Create Post</h1>
            <a href="{{route('posts')}}" class="btn btn-primary " role="button">All Posts</a>
        </div>
    </div>



    <div class="container mt-5">
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <label for="">Title : </label>
                <input type="text" name="title" id="" class="form-control" placeholder="Please Enter Post Title ....">
                @if ($errors->has('title'))
                    <li class="text-danger">{{ $errors->first('title') }}</li>
                @endif
            </div>
            <div class="form-group mb-4">
                <label for="">Photo : </label>
                <input type="file" name="photo" id="" class="form-control" placeholder="Please Enter POst Photo ....">
                @if ($errors->has('photo'))
                    <li class="text-danger">{{ $errors->first('photo') }}</li>
                @endif
            </div>

            <div class="form-group">
                <label for="">Content : </label>
                <textarea class="form-control" name="content" id="" cols="30" rows="5"></textarea>
            </div>
            @if ($errors->has('content'))
                <li class="text-danger">{{ $errors->first('content') }}</li>
            @endif
            <button type="submit" class="btn btn-primary mt-5">Save</button>
        </form>
    </div>

@endsection
