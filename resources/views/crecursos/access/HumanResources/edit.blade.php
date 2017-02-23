@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.humanresources.management') . ' | ' . trans('labels.crecursos.access.humanresources.edit'))


@section('page-header')
    <h1>
        {{ trans('labels.crecursos.access.humanresources.management') }}
        <small>{{ trans('labels.crecursos.access.humanresources.edit') }}</small>
    </h1>
@endsection

@section('content')
  
  
  <div class="box box-success">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('labels.crecursos.access.humanresources.edit') }}</h2>
    </div><!-- /.box-header -->
    <div class="box-body">
      @include('crecursos.access.humanresources.forms.vacant')
    </div><!-- /.box-body -->
  </div><!--box-->
    
  <div class="box box-success">
    <div class="box-body">
      <div class="pull-left">
        {{ link_to_route('crecursos.access.humanresources.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

      <div class="pull-right">
        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
    </div><!-- /.box-body -->
  </div><!--box-->

    <!-- {{ Form::close() }} -->
@stop
