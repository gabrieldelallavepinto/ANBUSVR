<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'user_id','name', 'token_key'
    ];

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function scenes()
    {
        return $this->hasMany('App\Scene');
    }

    public function participants()
    {
        return $this->hasMany('App\Participant');
    }

    public function gazes()
    {
        return $this->hasMany('App\Gaze');
    }

    public function grabbs()
    {
        return $this->hasMany('App\Grab');
    }

}
