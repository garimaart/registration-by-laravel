<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'detail',
    ];

    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }
}
