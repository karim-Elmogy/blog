<?php

namespace App\Http\Interfaces;

interface CommentInterface
{

    public function store($request);


    public function destroy($id);
}
