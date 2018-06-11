@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Cadastro de Pessoas')

@section('css')

    <style>
        .form-control[required=""] {
            border-color: #F00;
        }
    </style>

@endsection
<script src="{{ asset('js/jquery.mask.min.js') }}" defer></script>
@section('content_header')

    <div class="page-header">
        <h1>Cadastro <small>@if (Request::is('*/create')) {{ trans('laravel-crud::view.create') }} @else {{ trans('laravel-crud::view.edit') }} @endif</small></h1>
        <a href="{{ URL::to('cadastros') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('laravel-crud::view.btn-list') }}">
            <i class="fa fa-list"></i> <span class="hidden-xs">{{ trans('laravel-crud::view.btn-list') }}</span>
        </a>
    </div>

@endsection


@section('content')

    @if (Session::has('msgSuccess'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('msgSuccess') }}
        </div>
    @elseif (! empty($errors) && count($errors->all()))
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach ($errors->all() AS $e)
                <b>{{ $e }}</b><br/>
            @endforeach
        </div>
    @endif


    @if (Request::is('*/create'))
        <div class="box box-success">
            {{ Form::open(['action' => 'CadastrosController@store', 'method' => 'POST']) }}
    @else
        <div class="box box-warning">
            {{ Form::model($cadastro, ['action' => ['CadastrosController@update', $cadastro->id], 'method' => 'PATCH']) }}
    @endif

            <div class="box-body">
                <div class="form-group">

                    <div class="col-xs-12">
                        {{ Form::label("name", trans('laravel-crud::view.name'), ["class" => "control-label"]) }}
                        {{ Form::text("name", @$cadastro->name, ["class" => "form-control", "placeholder" => trans('laravel-crud::view.name'), "maxlength" => "255", "required"]) }}
                    </div>

                    <div class="col-xs-12">
                        {{ Form::label("email", trans('laravel-crud::view.email'), ["class" => "control-label"]) }}
                        {{ Form::email("email", @$cadastro->email, ["class" => "form-control", "placeholder" => trans('laravel-crud::view.email'), "maxlength" => "255", "required"]) }}
                    </div>

                    <div class="col-xs-12">
                        {{ Form::label("phone", "Telefone", ["class" => "control-label"]) }}
                        {{ Form::text("phone", @$cadastro->phone, ["class" => "form-control", "data-inputmask" => '"mask": "(99) 99999-9999"', "placeholder" => "", "maxlength" => "15", "required"]) }}
                    </div>

                    <div class="col-xs-12">
                        {{ Form::label("address", "Endereço", ["class" => "control-label"]) }}
                        {{ Form::text("address", @$cadastro->address, ["class" => "form-control", "placeholder" => "Address", "maxlength" => "255", "required"]) }}
                    </div>

                    <div class="col-xs-12">
                        {{ Form::label("address_nro", "Número", ["class" => "control-label"]) }}
                        {{ Form::number("address_nro", @$cadastro->address_nro, ["class" => "form-control", "placeholder" => "", "maxlength" => "11", "required"]) }}
                    </div>

                    <div class="col-xs-12">
                        {{ Form::label("city", "Cidade", ["class" => "control-label"]) }}
                        {{ Form::text("city", @$cadastro->city, ["class" => "form-control", "placeholder" => "City", "maxlength" => "255", "required"]) }}
                    </div>

                    {{-- <div class="col-xs-12">
                        {{ Form::label("state", "Estado", ["class" => "control-label"]) }}
                        {{ Form::text("state", @$cadastro->state, ["class" => "form-control", "placeholder" => "State", "maxlength" => "2", "required"]) }}
                    </div> --}}

                    <div class="col-xs-12">
                        {{ Form::label("estado_id", "Estado", ["class" => "control-label"]) }}
                        {{ Form::select("estado_id", @$estados, (@$cadastro->estado_id ? @$cadastro->estado_id:null), ["class" => "form-control", "required"]) }}
                    </div>

                    <div class="col-xs-12">
                        {{ Form::label("pobox", "CEP", ["class" => "control-label"]) }}
                        {{ Form::text("pobox", @$cadastro->pobox, ["class" => "form-control", "data-inputmask" => '"mask": "99999-999"', "placeholder" => "", "maxlength" => "9", "required"]) }}
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-xs-12 text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> {{ trans('laravel-crud::view.btn-save') }}
                        </button>
                    </div>
                </div>
            </div>

        {{ Form::close() }}
    </div>
@endsection


@section('js')

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('input[name="date"]').mask('00/00/0000');
            $('input[name="pobox"]').mask('00000-000');
            $('input[name="phone"]').mask('(00) 00000-0000');

            $('input[name="pobox"]').focusout(function() {
            $('input[name="pobox"]').val( this.value.toUpperCase() );
            });
        })
    </script>

@endsection
