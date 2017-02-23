@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.personal.management') . ' | ' . trans('labels.crecursos.access.personal.edit'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datepicker/datepicker3.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.crecursos.access.personal.management') }}
        <small>{{ trans('labels.crecursos.access.personal.edit') }}</small>
    </h1>
@endsection

@section('content')
  {{ Form::model($personal, ['route' => ['crecursos.access.personal.update', $personal], 'class' => 'form-horizontal', 'personal' => 'form', 'method' => 'PATCH', 'id' => 'create-personal']) }}

  	@include('crecursos.access.personal.forms.personal')
  	
  <div class="box box-success">
    <div class="box-body">
      <div class="pull-left">
        {{ link_to_route('crecursos.access.personal.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

    	<div class="pull-right">
      	{{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
    	</div><!--pull-right-->

     	<div class="clearfix"></div>
    </div><!-- /.box-body -->
  </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts-end')
  {{ Html::script('js/backend/plugin/datepicker/bootstrap-datepicker.js') }}
  
  <script>
    $(function () {
      //Date picker
      $('#birthdate').datepicker({
        autoclose: true
      });
    });
  </script>
@stop