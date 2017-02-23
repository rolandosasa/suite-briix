@extends('crecursos.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ access()->user()->name }}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! getLanguageBlock('crecursos.lang.welcome') !!}

            @foreach ( Auth::user()->enterprise->contracts as $contract)
                {{$contract->database}}
            @endforeach 
        </div><!-- /.box-body -->
    </div><!--box box-success-->

    
@endsection