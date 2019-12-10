<?php

namespace App\Http\Controllers;

use App\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('dashboard');
    }

    function alunos()
    {
        $alunos = DB::table('alunos')
            ->select('id', 'name', 'curso')
            ->orderBy('name', 'asc')
            ->orderBy('curso', 'asc')
            ->get();

        return view('pages.alunos', compact('alunos'));
    }

    function professores()
    {
        $professores = DB::table('users')
                           ->select('name', 'id', 'area')
                           ->orderBy('name', 'asc')
                           ->orderBy('area', 'asc')
                           ->get();
        
        return view('pages.professores', compact('professores'));
        
    }

    function projetos()
    {   
        $professores = DB::table('users')->select('name', 'id')->get();
        $alunos = DB::table('alunos')->select('id', 'name')->get();
        return view('pages.projetos', compact('alunos', 'professores'));
    }

    function inserir(Request $req){
        $proj = new Projeto($req->all());
        $proj->save();

        return redirect('geral/projetos');
    }
}
