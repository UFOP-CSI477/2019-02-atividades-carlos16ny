<?php

namespace App\Http\Controllers;

use DB;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subject::create([
            'name' => $request->name,
            'price' => floatVal($request->price)
        ]);

        return back()->withStatus(__('Certificado Criado Com Sucesso'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        $subject = Subject::find($req->query('subject'));
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $subject = Subject::find($request->id);
        $subject->update(
            [
                'name' => $request->name,
                'price' => $request->price
            ]
        );

        return back()->withStatus(__("Edição Realizada Com Sucesso"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $cert = Subject::find($req->query('subject'));
        $requests = DB::table('requests')->where('requests.subject_id', '=', $req->query('subject'))->get();
        if(count($requests) > 0){
            return redirect()->route('subjects')->withErrors('Certificado Possui Requerimentos Associados');
        }else{
            $cert->delete();
            return redirect()->route('subjects')->withStatus(__('Cartificado Deletado Com Sucesso'));
        }
    }
}
