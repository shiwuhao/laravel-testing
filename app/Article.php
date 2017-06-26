<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function scopeTrending($query, $limit = 3)
    {
        return $query->orderBy('reads', 'desc')->limit($limit)->get();
    }
}
