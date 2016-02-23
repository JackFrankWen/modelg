<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shopinfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
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
        $shop = Shopinfo::findOrNew(0);
       
        $input = $request->all();
        $shop->fill($input)->save();

        return redirect()->action('Admin\ShopinfoController@index');
    }

}
