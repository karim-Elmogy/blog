<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['user_id','title','content','photo','slug','author'];
    use HasFactory;


    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function comments(){
        return $this -> hasMany(Comment::class,'post_id');
    }
}
