<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function form(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required'
        ]);
        return ['msg' => 'Oh You are succesfull now. '];
    }
}
