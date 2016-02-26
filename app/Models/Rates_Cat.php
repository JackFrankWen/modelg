<?php

namespace App\Models;

use App\Models\Rates;
use Illuminate\Database\Eloquent\Model;

class Rates_Cat extends Model
{
  	protected $table = 'rates_cat';
    public $timestamps = false;
    protected $fillable = array('rates_name');
    public $childrates = null;

    /**
     * Get the rates item from the rates_cat.
     */
    public function rates()
    {
      return $this->hasMany('App\Models\Rates','rates_cat_id');
    }

    /**
     * Delete table data rate_cat and releted child rates
     */
    public function delete(){
      // delete all related rates item
      $this->rates()->delete();
      return parent::delete();
    }

    /**
     * Add some new rates item to dabase
     *
     * @param  int,int,object,array  
     */
    public function addChildrates($addAmount,$id,$rate_cat,$input)
    {
      for ( $i = 0; $i < $addAmount; $i++) { 
          $rates[$i] = new Rates;
          $rates[$i]->rates_cat_id = $id;
          $rate_cat->rates()->save($rates[$i]);
      }
      $rates = Rates::where('rates_cat_id',$id)->get();
      //Reassgin rates_order to all child rates
      $i = 0;
      foreach ($rates as $rate) {
        $rates[$i]->rates_info = $input['rates_info'][$i];
        $rates[$i]->rates_price = $input['rates_price'][$i];
        $rates[$i]->rates_order = $i;
        $rate->save();
        $i++;
      }

    }

    /**
     * Delete child item
     *
     * @param  int,int 
     */
    public function deleteChildrates($amount,$id,$input)
    {
      // delete
      for ( $i = 0; $i < $amount; $i++) { 
           $rates = Rates::where('rates_cat_id',$id);
           $rates->where('rates_order', '=', $i)->delete();
      }
      $rates = Rates::where('rates_cat_id',$id)->orderBy('rates_order', 'asc')->get();
        $i = 0;

        //Reassgin rates_order to all child rates
        foreach ($rates as $rate) {
          $rates[$i]->rates_info = $input['rates_info'][$i];
          $rates[$i]->rates_price = $input['rates_price'][$i];
          $rates[$i]->rates_order = $i;
          $rate->save();
          $i++;
        }
    }
   	
    /**
     * Update child item
     *
     * @param  int,int 
     */
    public function updateChildrates($input,$id)
    {
       $rates = Rates::where('rates_cat_id',$id)->get();
      $i = 0;
      foreach ($rates as $rate) {

          $rate->rates_info = $input['rates_info'][$i];
          $rate->rates_price = $input['rates_price'][$i];
          $rate->rates_order = $i;
          $rate->save();
          $i++;
      }
    }
}
