@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Easy TCC')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center align-items-center d-flex">
      <div class="col-lg-7 col-md-8">
        <h1 class="text-center text-white">{{ __('Bem vindo ao sistema de controle de Trabalho de Conclusão de Curso') }}</h1>
          <div class="row mt-4">
            <div class="col-md-6 d-flex justify-content-center">
              <a href="{{ route('geral') }}">
                <button class="btn btn-primary btn-round btn-lg">
                  <i class="fa fa-users"></i> Alunos
                </button>
              </a>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
              <a href="{{ route('home') }}">
                <button class="btn btn-primary btn-round btn-lg">
                  <i class="fa fa-university"></i> Professores
                </button>
              </a>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
