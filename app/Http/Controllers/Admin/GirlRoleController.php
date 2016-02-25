<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;

class GirlRoleController extends Controller
{
   /**
      * Only login user can visit.
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
         return view('admin.girls.role');
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

        // $validator = Validator::make($input, [
        //             'girl_name' => 'required',
        //         ]);
        // if ($validator->fails()) {
        //    return ;
        // }
        
        $mime =  $request->file('image')->getMimeType();
        $isImage =  $request->file('image')->getClientOriginalExtension();
        $imageName = $request->file('image')->getClientOriginalName();
        $imageUrl =  public_path() . '/images/girls/';
        $request->file('image')->move($imageUrl, $imageName);
        return redirect()->action('Admin\GirlRoleController@index');
         
     }
}
