<?php

namespace App\Http\Controllers\Admin;

use App\Models\Girls;
use App\Models\Girl_Roster;

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
        $girls = Girls::All();
        
        return view('admin.girls.role', [
                 'girls' => $girls
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

        $validator = Validator::make($input, [
                    'girl_name' => 'required',
                ]);
        if ($validator->fails()) {
           return 'some error';
        }
        $girl = new Girls;
        
        // $isImage =  $request->file('image')->getClientOriginalExtension();
        // $mime =  $request->file('image')->getMimeType();
        $imageName = $request->file('image')->getClientOriginalName();
        $imageUrl =  public_path() . '/images/girls/';
        $request->file('image')->move($imageUrl, $imageName);
        $girl->img_url ='/images/girls/'.$imageName;
        $girl->fill($input)->save();

        $roster = new Girl_Roster;
        $girl->girl_roster()->save($roster);
        return redirect()->action('Admin\GirlRoleController@index');
         
     }

       /**
       * Remove the cats and cats releated data.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          $girl = Girls::find($id);
          $girl->delete();
          
       
          return 'good';
      }
}
