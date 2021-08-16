<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{

  use HasFactory;

  protected $gauraded=[];
   public function getRouteKeyName()
   {
       return 'slug';   }

    public function category(){

        return $this->belongsTo((Category::class));

    }
    public function user(){

        return $this->belongsTo((User::class));

    }
    
}
