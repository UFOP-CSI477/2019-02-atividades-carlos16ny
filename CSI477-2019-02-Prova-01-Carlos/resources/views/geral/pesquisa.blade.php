@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'geral', 'title' => __('Easy TCC')])
@section('content')
<div class="container">
    <div class="row pl-3 mb-3">
        <a href="{{ route('geral') }}"><button type="button" class="btn btn-success">Voltar</button></a>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header card-header-danger">
                <h4 class="card-title">Pesquisa</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Professor</th>
                            <th>Área</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($professores as $professor)
                        <tr>
                            <td>{{ $professor->id }}</td>
                            <td>{{ $professor->name }}</td>
                            <td>{{ $professor->area }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
