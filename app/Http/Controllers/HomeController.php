<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jrean\UserVerification\Traits\UserVerification;

class HomeController extends Controller
{
    use UserVerification;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $a;
    public function __construct()
    {
        $this->middleware('auth');
//        $this->a=$this->middleware('isVerified', ['except' => ['isVerified']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        echo Session::has('sweet_alert.alert');

        return view('home');
    }
}
