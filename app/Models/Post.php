<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'except',
        'is_published',
        'image'
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'post_id', 'id');
    }
}
