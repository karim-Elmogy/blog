<?php


define('PAGINATION_COUNT', 10);

if(! function_exists('uploadImage')) {
    function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        return $filename;
    }
}

if(! function_exists('uploadImagedo')) {
    function uploadImagedo($folder, $request)
    {
        $image=$request->photo;
        $imagename=time().'.'.$image->getClientOriginalExtension();
      return  $request->image->move($folder,$imagename);
    }
}

