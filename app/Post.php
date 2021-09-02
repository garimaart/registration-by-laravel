<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'category_id', 'user_id', 'slug', 'title', 'excerpt', 'body',
    ];

    protected $with = ['category', 'author'];

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

        return $this->belongsTo(User::class, 'user_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    //commentUsers -> lists all the users that have commented on this post
}
