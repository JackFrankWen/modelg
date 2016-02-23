<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\userlogin_record;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogController extends Controller
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
    	$users = userlogin_record::all();
        return view('admin.log', [
                 'users' => $users
             ]);
    }
}
