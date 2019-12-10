@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'projeto', 'title' => __('Easy TCC')])
@section('content')
<div class="content mb-3">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">Inserir Projeto</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('adminInserir') }}">
                        @csrf
                        <div class="form-group my-4">
                            <label for="exampleFormControlSelect1">Nome do Alunos</label>
                            <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1" name="aluno_id">
                                @foreach ($alunos as $aluno)
                                    <option value="{{ $aluno->id }}">{{ $aluno->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-4">
                            <label for="exampleFormControlSelect2">Nome do Professor</label>
                            <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect2" name="professor_id">
                                @foreach ($professores as $professor)
                                    <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-4">
                            <label for="exampleFormControlInput0">Título</label>
                            <input type="text" class="form-control" id="exampleFormControlInput0" name="titulo">
                        </div>
                        <div class="form-group my-4">
                            <label for="exampleFormControlInput1">Ano</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="ano">
                        </div>
                        <div class="form-group my-4">
                            <label for="exampleFormControlInput2">Semestre</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" name="semestre">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
