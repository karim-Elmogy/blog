<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostInterface;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public $postInterface;

    public function __construct(PostInterface $postInterface)
    {
        $this->postInterface=$postInterface;
    }

    public function index()
    {
        return $this->postInterface->index();
    }

    public function create()
    {
        return $this->postInterface->create();
    }


    public function store(PostRequest $request)
    {
        return $this->postInterface->store($request);
    }




    public function edit($id)
    {
        return $this->postInterface->edit($id);
    }


    public function update(UpdatePostRequest $request)
    {
        return $this->postInterface->update($request);
    }


    public function destroy($id)
    {
        return $this->postInterface->destroy($id);
    }

    public function postsTrashed()
    {
        return $this->postInterface->postsTrashed();
    }
    public function hdelete($id)
    {
        return $this->postInterface->hdelete($id);
    }

    public function restore($id)
    {
        return $this->postInterface->restore($id);

    }
}
