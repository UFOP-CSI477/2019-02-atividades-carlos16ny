<?php

namespace App\Http\Controllers;

use App\Request;
use App\Subject;
use DB;
use Illuminate\Http\Request as Req;
use Illuminate\Support\Facades\Date;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->type == 1){
            $solicitacoes = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id')
                                                 ->join('subjects', 'requests.subject_id', '=', 'subjects.id')
                                                 ->select('subjects.name as snome', 'users.name as unome', 'requests.date as data', 'subjects.price as preco')
                                                 ->get();                                           
        }else{
            $solicitacoes = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id')
                                                 ->join('subjects', 'requests.subject_id', '=', 'subjects.id')
                                                 ->select('subjects.name as snome', 'users.name as unome', 'requests.date as data', 'subjects.price as preco')
                                                 ->where('users.id', '=', auth()->user()->id)
                                                 ->get();
        }

        return view('requests.index', ['solicitacoes' => $solicitacoes]);

    }

    public function nova(){
        $req = Subject::all();
        return view('requests.add', ['req' => $req]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Req $request)
    {
        $req = $request->except(['_token', '_method']);
        $req['date'] = Date::today();

        Request::create($req);

        return back()->withStatus(__('Requisiçao adicionada com sucesso'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Req $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Req $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Req $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Request $request)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Req $request)
    {
        //
    }
}
