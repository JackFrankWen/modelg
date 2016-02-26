<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Girl_Roster extends Model
{
    protected $table ="girl_roster";
    public $timestamps = false;
    public $girl_name = null;
    public $img_url = null;

    public function get_girl()
    {
    	return $this->belongsTo('App\Models\Girls', 'girl_id','id');
    }
}
