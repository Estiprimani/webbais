<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tier= Auth::user()->getTier();
        if ($tier=="AdminSystem"){
            return redirect('/admin/home');
        }elseif ($tier=="AdminUniv") {
            return redirect('/university/home');
        }elseif ($tier=="Applicant") {
            return redirect('/applicant/home');
        }else{
            return view('/welcome');
        }
    }
}
