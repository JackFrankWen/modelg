<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Girls extends Model
{
    //
    protected $table ="girls";
    public $timestamps = false;
  	protected $fillable = array('girl_name','girl_age','girl_nation','girl_description');
  	/**
  	 * One girl has a roster.Get girl_roster
  	 */
  	public function girl_roster()
  	{
  		return $this->hasOne('App\Models\Girl_roster','girl_id');
  	}
}
