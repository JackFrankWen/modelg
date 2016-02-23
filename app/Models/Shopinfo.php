<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shopinfo extends Model
{
    protected $table = 'shop_info';
    public $timestamps = false;
    protected $fillable = array('shop_name', 'shop_solgan', 'shop_state','shop_city','shop_postcode','shop_postcode','shop_suburb',
      	'shop_address','shop_email','shop_phone');

  
}
