<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 'type', 'company', 'addressline1', 'addressline2', 'country','state'
    ];
    public function customer()
    {
        return $this->hasMany('App\Customer')->orderBy('id', 'desc');
    }
}
