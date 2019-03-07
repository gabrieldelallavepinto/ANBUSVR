<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grab extends Model
{
    protected $table = 'grabbs';

    protected $fillable = [
        'project_id','participant_id','item_id','scene_id','sequence', 'timeStart', 'timeEnd'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function scene()
    {
        return $this->belongsTo('App\Scene');
    }

    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
}
