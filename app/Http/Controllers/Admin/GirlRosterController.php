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
}
