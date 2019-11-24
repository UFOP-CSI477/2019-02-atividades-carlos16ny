@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
    
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-inner--text">{{ session('status') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tipos de Certificados</h3>
                            </div>
                            <div class="col text-right">

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
                                    @if( auth()->user()->type == 1 )
                                        <th scope="col"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($subjects as $s)
                                    <tr>
                                        <th scope="row">
                                            {{ $s->name }}
                                        </th>
                                        <th >
                                            {{ $s->price }}
                                        </th>
                                        @if ( auth()->user()->type == 1)
                                        <th class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('subject.destroy', ['subject' => $s]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Quer realmente deletar esse cerificado ?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Excluir') }}
                                                            </button>
                                                        </form>    
                                                        <a class="dropdown-item" href="{{ route('user.edit', $s) }}">{{ __('Editar') }}</a>
                                                    
                                                </div>
                                            </div>
                                        </th>
                                        @endif
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