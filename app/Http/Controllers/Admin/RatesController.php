<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rates;
use App\Models\Rates_Cat;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RatesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates_cats = Rates_Cat::all();
        foreach ($rates_cats as $cat) {
            //Get Rates_Cat related rates and orderby rates_order
            $inputAmount = Rates_Cat::find($cat->id)->rates()->orderBy('rates_order')->get();
            foreach ($inputAmount as $item) 
            {
                $cat->childrates[] = $item;
            }
        }
        return view('admin.rates', [
                 'rates_cats' => $rates_cats
             ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
         
        $rates_cat = new Rates_Cat;
        $rates_cat->rates_name = $input['rates_name'];
        $rates_cat->save();

        //calculate rates input amount and insert into rates table
        $inputAmount = sizeof($input['rates_info']);
        for($i = 0; $i < $inputAmount; $i++){
            $rates[$i] = new Rates;
            $rates[$i]->rates_info = $input['rates_info'][$i];
            $rates[$i]->rates_price = $input['rates_price'][$i];
            $rates[$i]->rates_order = $i;
            $rates_cat->rates()->save($rates[$i]);
        }

         return redirect()->action('Admin\RatesController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = $request->all();
        $rate_cat = Rates_Cat::findOrFail($id);
        $rate_cat->fill($input)->save();

        $ratesAmount = $rate_cat->rates->count();
        if(isset($input['rates_info'])){
            $inputAmount = sizeof($input['rates_info']);
        }else{
            $inputAmount = 0;
        }
        $amount = $inputAmount -$ratesAmount;
        if ($amount > 0) {
            //Add new items to database
           $rate_cat->addChildrates($amount,$id,$rate_cat,$input);
        }elseif ($amount == 0) {
            //update
            $rate_cat->updateChildrates($input);
        }else{
            //delete
            $amount = abs($amount);
            $rate_cat->deleteChildrates($amount,$id,$input);
        }
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rate_cat = Rates_Cat::findOrFail($id);
        //Method /App/Models/Rates_Cat
        $rate_cat->delete();
       

       
    }
}
