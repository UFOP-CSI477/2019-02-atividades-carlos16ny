@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'geral', 'title' => __('Easy TCC')])
@section('content')
    <div class="container">
        <div class="row pl-3 mb-3">
            <a href="{{ route('welcome') }}"><button type="button" class="btn btn-success">Voltar</button></a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon card-header-warning">
                        <div class="card-icon">
                            <i class="material-icons">search</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Pesquisa por Área de Conhecimento</h4>
                        <form action="{{ route('geralPesquisa') }}" method="post">
                            @csrf
                            <div class="form-group mt-4">
                              <label for="">Área</label>
                              <input type="text" class="form-control" name="area" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                <i class="material-icons">send</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">language</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Relatórios de Projeto</h4>
                        <p>Pesquise por todos os registro de projetos</p>
                        <a href="{{ route('geralProjetos') }} ">
                            <button class="btn btn-primary btn-fab btn-fab-mini btn-round mt-3">
                                <i class="material-icons">send</i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection