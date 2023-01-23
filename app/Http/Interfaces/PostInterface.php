<?php

namespace App\Http\Interfaces;

interface PostInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($id);

    public function postsTrashed();

    public function hdelete($id);

    public function restore($id);
}
