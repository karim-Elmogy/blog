<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['post_id','user_id','comment','date'];
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class,'user_id');
    }

    public function post()
    {
        return $this->belongsToMany(Post::class,'post_id');
    }
}
