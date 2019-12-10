@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'geral', 'title' => __('Easy TCC')])
@section('content')
    <div class="container">
        <div class="row pl-3 mb-3">
            <a href="{{ route('geral') }}"><button type="button" class="btn btn-success">Voltar</button></a>
        </div>
        <div class="row">

            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">Projetos</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Professor</th>
                                <th>Aluno</th>
                                <th>Título</th>
                                <th>Área</th>
                                <th>Ano</th>
                                <th>Semestre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projetos as $projeto)
                            <tr>
                                <td>{{ $projeto->id }}</td>
                                <td>{{ $projeto->professor }}</td>
                                <td>{{ $projeto->aluno }}</td>
                                <td>{{ $projeto->titulo }}</td>
                                <td>{{ $projeto->area }}</td>
                                <td>{{ $projeto->ano }}</td>
                                <td>{{ $projeto->semestre }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
@endsection