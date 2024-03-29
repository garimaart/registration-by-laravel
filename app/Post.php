<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $gauraded = [];

    protected $with=['category','author'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {

        return $this->belongsTo((Category::class));
    }
    public function author()
    {

        return $this->belongsTo(User::class,'user_id');
    }
}
