<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userid', 'postid',  'comment'];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'postid', 'id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parentid');
    }
}
