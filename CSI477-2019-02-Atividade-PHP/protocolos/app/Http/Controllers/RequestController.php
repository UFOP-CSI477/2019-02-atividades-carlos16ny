<?php

namespace App\Http\Controllers;

use App\Request;
use App\Subject;
use App\User;
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
    public function index(Req $request)
    {
        if($request->query('data') && $request->query('user_id')){
            $solicitacoes = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id')
                                                 ->join('subjects', 'requests.subject_id', '=', 'subjects.id')
                                                 ->select('subjects.name as snome', 'users.name as unome', 'requests.date as data', 'subjects.price as preco', 'requests.id as id')
                                                 ->where('users.id', '=', $request->query('user_id'))
                                                 ->where('requests.date', '=', $request->query('data'))
                                                 ->get();

        }else{                                                  

            if(auth()->user()->type == 1){
                $solicitacoes = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id')
                                                    ->join('subjects', 'requests.subject_id', '=', 'subjects.id')
                                                    ->select('subjects.name as snome', 'users.name as unome', 'requests.date as data', 'subjects.price as preco', 'requests.id as id')
                                                    ->get();                                           
            }else{
                $solicitacoes = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id')
                                                    ->join('subjects', 'requests.subject_id', '=', 'subjects.id')
                                                    ->select('subjects.name as snome', 'users.name as unome', 'requests.date as data', 'subjects.price as preco', 'requests.id as id')
                                                    ->where('users.id', '=', auth()->user()->id)
                                                    ->get();
            }
        }

        $users = User::all();
        return view('requests.index', ['solicitacoes' => $solicitacoes, 'users' => $users , 'data' => $request->query('data'), 'user_id' => $request->query('user_id')]);

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

    public function update(Req $request){
        Request::find($request->id)->update(
            [
                'subject_id' => $request->subject_id,
                'user_id' => $request->user_id,
                'description' => $request->description
            ]
        );

        return back()->withStatus(__('Requisiçao editada com sucesso'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Req $request)
    {
        $subjects = Subject::all();
        $users = User::all();
        $requisicao = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id')
                                           ->join('subjects', 'requests.subject_id', '=', 'subjects.id')
                                           ->select('subjects.name as snome', 'users.name as unome', 'requests.date as data', 'requests.description', 'subjects.price as preco', 'requests.id as rid', 'users.id as uid', 'subjects.id as sid')
                                           ->where('requests.id', '=', $request->query('request'))
                                           ->get();
        // dd(compact('subjects', 'requisicao', 'users'));
        return view('requests.edit', compact('subjects', 'requisicao', 'users') );
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
