@extends('layouts.app')
@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ __('Adicione Uma Nova Requisição') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('requisicoes.create') }}" autocomplete="off">
                        @csrf
                        @method('post')

                        <h6 class="heading-small text-muted mb-4">{{ __('Informações do Usuário') }}</h6>
                        
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('req') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Tipo da Requisição') }}</label>
                                <select name="subject_id" id="" class="form-control form-control-alternative">
                                    @foreach ($req as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                        
                                @if ($errors->has('req'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('req') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('req') ? ' has-danger' : '' }}">
                            
                                <label class="form-control-label" for="input-name">{{ __('Descrição da Requisição') }}</label>
                                <textarea rows="6" class="form-control form-control-alternative" name="description"></textarea>

                                @if ($errors->has('req'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('req') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection