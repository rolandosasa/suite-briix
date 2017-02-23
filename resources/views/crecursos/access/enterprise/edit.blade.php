@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.enterprise.management') . ' | ' . trans('labels.crecursos.access.enterprise.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.crecursos.access.enterprise.management') }}
        <small>{{ trans('labels.crecursos.access.enterprise.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($enterprise, ['route' => ['crecursos.access.enterprise.update', $enterprise], 'class' => 'form-horizontal', 'Enterprise' => 'form', 'method' => 'PATCH', 'id' => 'edit-Enterprise']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.crecursos.access.enterprise.edit') }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                @include('crecursos.access.enterprise.forms.emp')
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('crecursos.access.enterprise.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop