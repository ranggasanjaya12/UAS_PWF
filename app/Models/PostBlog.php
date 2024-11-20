<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBlog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function catblog()
    {
        return $this->belongsTo(CatBlog::class);
    }
}
