@extends ('cmovil.layouts.master')

@section ('title', trans('labels.cmovil.access.lines.management') . ' | ' . trans('labels.cmovil.access.lines.create'))

@section('page-header')
    <h1>
        {{ trans('labels.cmovil.access.lines.management') }}
        <small>{{ trans('labels.cmovil.access.lines.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'cmovil.access.line.store', 'class' => 'form-horizontal', 'line' => 'form', 'method' => 'post', 'files' => true, 'id' => 'create-line']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.cmovil.access.lines.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('cmovil.access.includes.partials.header-buttons-lines')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                @include('cmovil.access.lines.forms.lin')
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('cmovil.access.line.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts-end')
    {{ Html::script('js/backend/access/enterprises/script.js') }}
@stop
