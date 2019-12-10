@extends('layouts.app', ['activePage' => 'professores', 'titlePage' => __('Lista de Professores')])

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
                  <th>Área</th>
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
    </div>
  </div>
</div>
@endsection