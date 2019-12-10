<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GeralController extends Controller
{
    function index(){
        return view('geral');
    }

    function projetos(){
        $projetos = DB::table('projetos as p')
                        ->join('alunos as a', 'p.aluno_id', '=', 'a.id')
                        ->join('users as u', 'p.professor_id', '=', 'u.id')
                        ->select('p.id', 'u.name as professor', 'a.name as aluno', 'u.area', 'p.ano', 'p.semestre', 'p.titulo')
                        ->orderBy('p.ano', 'desc')->orderBy('p.semestre', 'desc')->orderBy('aluno', 'asc')
                        ->get();

        return view('geral.projetos', ['projetos' => $projetos]);
    }
}
