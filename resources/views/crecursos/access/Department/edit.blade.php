@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.department.management') . ' | ' . trans('labels.crecursos.access.department.edit'))


@section('page-header')
    <h1>
        {{ trans('labels.crecursos.access.department.management') }}
        <small>{{ trans('labels.crecursos.access.department.edit') }}</small>
    </h1>
@endsection

@section('content')
  {{ Form::model($department, ['route' => ['crecursos.access.department.update', $department], 'class' => 'form-horizontal', 'department' => 'form', 'method' => 'PATCH', 'id' => 'create-department']) }}
  
  <div class="box box-success">
    <div class="box-header with-border">
        <h2 class="box-title">{{ trans('labels.crecursos.access.department.edit') }}</h2>
    </div><!-- /.box-header -->
    <div class="box-body">
      @include('crecursos.access.department.forms.dep')
    </div><!-- /.box-body -->
  </div><!--box-->
  	
  <div class="box box-success">
    <div class="box-body">
      <div class="pull-left">
        {{ link_to_route('crecursos.access.department.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

    	<div class="pull-right">
      	{{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
    	</div><!--pull-right-->

     	<div class="clearfix"></div>
    </div><!-- /.box-body -->
  </div><!--box-->

    {{ Form::close() }}
@stop
