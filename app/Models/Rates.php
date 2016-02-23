<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
  	protected $table = 'rates';
  	public $timestamps = false;
  	protected $fillable = array('rates_oder','rates_price','rates_info','rates_cat_id');

  	/**
  	 * Add some new rates item to dabase
  	 *
  	 * @param  object,array  
  	 */

   
}
