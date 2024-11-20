<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatBlog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function postBlogs()
    {
        return $this->hasMany(PostBlog::class);
    }
}
