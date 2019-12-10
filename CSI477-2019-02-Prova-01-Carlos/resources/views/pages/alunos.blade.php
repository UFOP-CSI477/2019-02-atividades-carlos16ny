@extends('layouts.app', ['activePage' => 'alunos', 'titlePage' => __('Lista de Alunos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Tabela de Alunos</h4>
            <p class="card-category">Alunos ordenados por nome e curso</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Curso</th>
                </thead>
                <tbody>
                  @foreach ($alunos as $aluno)
                      <tr>
                        <td>{{ $aluno->id }}</td>
                        <td>{{ $aluno->name }}</td>
                        <td>{{ $aluno->curso }}</td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection