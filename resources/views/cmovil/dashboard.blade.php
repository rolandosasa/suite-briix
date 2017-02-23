@extends('cmovil.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.cmovil.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.cmovil.dashboard.welcome') }} {{ access()->user()->name }}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
             {{Auth::user()->id}}
            @foreach ( Auth::user()->enterprise->contracts as $contract)
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-database"></i> Base de Datos Asignada
                        </div>
                        <div class="panel-body">
                            {{$contract->database}}
                        </div>
                    </div>
                </div>
            @endforeach 

            
            @productpermission('admin-users')
                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-home"></i> Crecursos activado
                        </div>

                        <div class="panel-body">
                            Usted puede entrara ver el modulo Crecursos
                                <li>{{ link_to_route('crecursos.dashboard', trans('navs.frontend.user.administration')) }}</li>
                        </div>
                    </div><!-- panel -->

                </div><!-- col-md-10 -->
            @endauth

        </div><!-- /.box-header -->
        <div class="box-body">
        
            {!! getLanguageBlock('cmovil.lang.welcome') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->

    <!--
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>--><!-- /.box tools -->
        <!--</div>--><!-- /.box-header -->
        <!--<div class="box-body">
            {!! history()->render() !!}
        </div>--><!-- /.box-body </div><!box box-success-->
@endsection