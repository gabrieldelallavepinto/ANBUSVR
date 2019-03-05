<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'project_id', 'name', 'age', 'gender'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function gazes()
    {
        return $this->hasMany('App\Gaze');
    }
}
