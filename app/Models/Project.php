<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'except',
        'price',
        'square',
        'category_id',
        'is_published',
        'preview',
        'carousel'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'project_id', 'id');
    }
}
