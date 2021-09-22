<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','user_id','is_admin'];



    public function user()
    {
        return $this->belongsTo('App\User');
    }

}


