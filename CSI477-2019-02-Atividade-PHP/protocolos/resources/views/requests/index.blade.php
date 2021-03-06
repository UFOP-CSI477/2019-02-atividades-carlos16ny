@extends('layouts.app')
@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            @if(auth()->user()->type == 1)
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <form action="{{ route('requisicoes.index') }}" method="get">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Filtrar Requisição</h3>
                            </div>
                            <div class="col">
                                @csrf
                                <div class="form-group">
                                    <label for="">Usuário</label>
                                    <select name="user_id" id="" class="form-control form-control-alternative" >
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == $user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Data</label>
                                    <input type="date" class="form-control form-control-alternative" name="data" id="" value="{{ $data != null ? $data : '' }}">
                                </div>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Pesquisar</button>
                            </form> 
                            <button class="btn btn-sm btn-primary" onclick="function(){ location.href = window.location.origin + '/requisicoes' } ">Limpar</button>
                            </div>
                        </div>
                </div>
            </div>
            @endif
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            @if(auth()->user()->type == 1)
                            <h3 class="mb-0">Todas Requisições</h3>
                            @else 
                            <h3 class="mb-0">Minhas Requisições</h3>
                            @endif
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nome do Certificado</th>
                                <th scope="col">Solicitante</th>
                                <th scope="col">Data</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Infos</th>
                                @if (auth()->user()->type == 1)
                                <th scope="col">Deletar</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php $soma = 0; @endphp
                            @foreach ($solicitacoes as $s)
                                @php
                                    $soma += $s->preco;
                                @endphp
                                <tr>
                                    <th scope="row">
                                        {{ $s->snome }}
                                    </th>
                                    <th >
                                        {{ $s->unome }}
                                    </th>
                                    <th >
                                        {{ $s->data }}
                                    </th>
                                    <th >
                                        {{ $s->preco }}
                                    </th>
                                    <th >
                                        <a href="{{ route('requisicao.edit', ['request' => $s->id]) }}">Ver</a>
                                    </th>
                                    @if (auth()->user()->type == 1)
                                    <th>
                                        <a href="">Deletar</a>
                                    </th>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Soma</th>
                                <th scope="col">{{ count($solicitacoes) }} Requisições</th>
                                <th scope="col"></th>
                                <th scope="col">{{ $soma }}</th>
                                <th scope="col"></th>
                                @if (auth()->user()->type == 1)
                                <th scope="col"></th>
                                @endif
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
