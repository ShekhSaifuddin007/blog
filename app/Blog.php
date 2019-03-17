<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id',
        'blog_name',
        'short_description',
        'long_description',
        'blog_img',
        'publication_status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('publication_status', 1)->orderBy('id', 'desc');
    }
}
