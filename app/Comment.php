<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
