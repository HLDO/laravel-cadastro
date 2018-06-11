@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Estados')

@section('css')

    <style>
        .form-control[required=""] {
            border-color: #F00;
        }
    </style>

@endsection

@section('content_header')
    
    <div class="page-header">
        <h1>Estados <small>@if (Request::is('*/create')) {{ trans('laravel-crud::view.create') }} @else {{ trans('laravel-crud::view.edit') }} @endif</small></h1>
        <a href="{{ URL::to('estados') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('laravel-crud::view.btn-list') }}">
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
            {{ Form::open(['action' => 'EstadosController@store', 'method' => 'POST']) }}
    @else
        <div class="box box-warning"> 
            {{ Form::model($estado, ['action' => ['EstadosController@update', $estado->id], 'method' => 'PATCH']) }}
    @endif
            

            <div class="box-body">
                <div class="form-group">
                    
                    <div class="col-xs-12"> 
                        {{ Form::label("name", trans('laravel-crud::view.name'), ["class" => "control-label"]) }}
                        {{ Form::text("name", @$estado->name, ["class" => "form-control", "placeholder" => trans('laravel-crud::view.name'), "maxlength" => "2", "required"]) }}
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
        })
    </script>

@endsection