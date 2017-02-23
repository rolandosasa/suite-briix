@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.job.management') . ' | ' . trans('labels.crecursos.access.contracts.create'))

@section('page-header')
    <h1>
        {{ trans('labels.crecursos.access.job.management') }}
        <small>{{ trans('labels.crecursos.access.job.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'crecursos.access.job.store', 'class' => 'form-horizontal', 'job' => 'form', 'method' => 'post', 'id' => 'create-job']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.crecursos.access.job.create') }}</h3>

            </div><!-- /.box-header -->

            <div class="box-body">
                @include('crecursos.access.job.forms.jobform')
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('crecursos.access.job.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/access/job/script.js') }}
@stop
