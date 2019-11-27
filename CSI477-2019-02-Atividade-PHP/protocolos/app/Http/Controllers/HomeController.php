<?php

namespace App\Http\Controllers;

use DB;

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
        if(auth()->user()->type == 1){
            $amount = DB::table('requests')->join('subjects', 'requests.subject_id', '=', 'subjects.id')->selectRaw('SUM(subjects.price) as soma')->get();
        }else{
            $amount = DB::table('requests')->join('subjects', 'requests.subject_id', '=', 'subjects.id')->selectRaw('SUM(subjects.price) as soma')->where('requests.user_id', '=', auth()->user()->id)->get();
        }

        if(auth()->user()->type == 1){
            $solicitacoes = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id')
                                                 ->join('subjects', 'requests.subject_id', '=', 'subjects.id')
                                                 ->select('subjects.name as sname', 'users.name as uname')
                                                 ->orderBy('subjects.name', 'ASC')
                                                 ->paginate(5);                                           
        }else{
            $solicitacoes = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id')
                                                 ->join('subjects', 'requests.subject_id', '=', 'subjects.id')
                                                 ->select('subjects.name as sname', 'users.name as uname')
                                                 ->where('users.id', '=', auth()->user()->id)
                                                 ->orderBy('subjects.name', 'ASC')
                                                 ->paginate(5);
        }

        $certificados = DB::table('subjects')->orderBy('subjects.name', 'ASC')->paginate(5);
        return view('dashboard', ['solicitacoes' => $solicitacoes, 'certificados' => $certificados, 'amount' => $amount]);
    }
}
