<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'project_id', 'name'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
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
