<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model




{


  //  protected $with = ['users'];
    protected $fillable = [
        'id'
    ];


    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
