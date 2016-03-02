<?php

namespace App\Http\Controllers\Admin;

use App\Models\Girl_Roster;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GirlRosterController extends Controller
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
        $rosters = Girl_Roster::all();
        foreach ($rosters as $roster) {
          $roster->girl_name = $roster->get_girl->girl_name;
          $roster->img_url = $roster->get_girl->img_url;
        }
        return view('admin.girls.roster', [
                 'rosters' => $rosters
             ]);
     }

     /**
      * Update Roster girl data.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request,$id)
     {
        $roster = Girl_Roster::find($id);
        $input = $request->all();
        
        $array = $input['input'];
        $roster['mon'] = $array[0];
        $roster['tue'] = $array[1];
        $roster['wed'] = $array[2];
        $roster['thu'] = $array[3];
        $roster['fri'] = $array[4];
        $roster['sat'] = $array[5];
        $roster['sun'] = $array[6];
        $roster->save();
        return $array;
     }
}
