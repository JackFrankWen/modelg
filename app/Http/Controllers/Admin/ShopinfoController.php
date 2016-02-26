<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shopinfo;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class ShopinfoController extends Controller
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

        $shop = Shopinfo::findOrNew(0);
        return view('admin.shopinfo', [
                 'shop' => $shop
             ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $input = $request->all();
        $messages =
        $validator = Validator::make($input, [
                    'shop_name' => 'required',
                    'shop_postcode' => 'required|numeric',
                ]);
        if ($validator->fails()) {
            return redirect('admin/shopinfo')
                 ->withErrors($validator)
                ->withInput();
        }

        $shop = Shopinfo::findOrNew(0);
       
        $shop->fill($input)->save();

        return redirect()->action('Admin\ShopinfoController@index');
    }

}
