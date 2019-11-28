@extends('layouts.app')
@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row mt-5">

        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ __('Editar Certificado') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('subject.edit') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Informações do Certificado') }}</h6>
                        
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
                                <label class="form-control-label" for="input-name">{{ __('Nome do Certificado') }}</label>
                                <input class="form-control form-control-alternative" type="text" name="name" value="{{ $subject->name }}">
                            </div>

                            <div class="form-group{{ $errors->has('req') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Preço do Certificado') }}</label>
                                <input class="form-control form-control-alternative" type="text" name="price" value="{{ $subject->price }}">
                            </div>

                            <input type="hidden" name="id" value="{{ $subject->id }}">
        
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