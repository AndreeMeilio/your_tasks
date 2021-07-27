<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\MataPelajaran;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_mata_pelajaran = MataPelajaran::where('users_id', Auth::user()->id)->get();
        
        return view('home', ['data_mata_pelajaran' => $data_mata_pelajaran]);
    }
}
