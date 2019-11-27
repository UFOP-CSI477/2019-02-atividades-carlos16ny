@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tipos de Certificados</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('subjects') }}" class="btn btn-sm btn-primary">Ver Todas</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nome do Certificado</th>
                                    <th scope="col">Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificados as $s)
                                    <tr>
                                        <th scope="row">
                                            {{ $s->name }}
                                        </th>
                                        <th >
                                            {{ $s->price }}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                @if(auth()->user()->type == 1)
                                <h3 class="mb-0">Ultimas Solicitações</h3>
                                @else
                                <h3 class="mb-0">Minhas Ultimas Solicitações</h3>
                                @endif
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('requisicoes.index') }}" class="btn btn-sm btn-primary">Ver Todas</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Atendente</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($solicitacoes as $sol)
                                <tr>
                                    <th scope="row">
                                        {{ $sol->sname }}
                                    </th>
                                    <td>
                                        {{ explode(" ", $sol->uname)[0] }}
                                    </td>
                         
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush