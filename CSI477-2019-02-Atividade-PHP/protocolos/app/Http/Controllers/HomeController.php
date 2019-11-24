<?php

namespace App\Http\Controllers;

use App\Subject;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $solicitacoes = Subject::paginate(5);
        return view('dashboard', ['solicitacoes' => $solicitacoes]);
    }
}
