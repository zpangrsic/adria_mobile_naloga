<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content'
    ];

    public $perPage = 5;

    public static function getListData()
    {
        return Post::query()->orderBy('created_at', 'desc')->paginate();
    }
}
