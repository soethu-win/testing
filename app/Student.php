<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','email','address',];

    public function brand($value=''){
    	return $this->belongsTo('App\Brand');
    }
}
