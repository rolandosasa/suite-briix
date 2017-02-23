@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.candidate.management') . ' | ' . trans('labels.crecursos.access.contracts.create'))

@section('page-header')
    <h1>
        {{ trans('labels.crecursos.access.candidate.management') }}
        <small>{{ trans('labels.crecursos.access.candidate.create') }}</small>
    </h1>    
@endsection

@section('content')
         {{ Form::open(['route' => 'crecursos.access.candidate.store', 'class' => 'form-horizontal', 'candidate' => 'form', 'method' => 'post', 'id' => 'create-candidate']) }}
          <div class="box box-success">
            <div class="box-header with-border">
                <h2 class="box-title">{{ trans('labels.crecursos.access.candidate.create') }}</h2>
            </div><!-- /.box-header -->
            <div class="box-body">
                @include('crecursos.access.Candidate.forms.Candidate')
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('crecursos.access.candidate.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

