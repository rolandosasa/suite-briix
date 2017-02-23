@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.concept.management') . ' | ' . trans('labels.crecursos.access.concept.create'))

@section('page-header')
  <h1>
      {{ trans('labels.crecursos.access.concept.management') }}
      <small>{{ trans('labels.crecursos.access.concept.main-h') }}</small>
  </h1>
@endsection

@section('content')
  {{ Form::open(['route' => 'crecursos.access.estimated.store', 'class' => 'form-horizontal', 'concept' => 'form', 'method' => 'post', 'id' => 'create-estimated']) }}

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.crecursos.access.concept.create') }}</h3>       
    </div><!-- /.box-header -->

    <div class="box-body">
      <div class="form-group">
        {{ Form::label('time_programmed', trans('validation.attributes.crecursos.access.estimated.time_programmed'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
          {{ Form::text('time_programmed', null, ['id' => 'time_programmed','required' => '','class' => 'form-control input-sm time_programmed', 'placeholder' => trans('validation.attributes.crecursos.access.estimated.time_programmed')]) }}
        </div>
      </div>

      <div style='display:none;'>
        {{ Form::text('concept_id', $concept, ['id' => 'concept_id', 'class' => 'form-control input-sm']) }}
        {{ Form::text('month_id', $month, ['id' => 'month_id', 'class' => 'form-control input-sm']) }}
      </div>
    </div><!-- /.box-body -->
  </div><!--box-->

  <div class="box box-success">
    <div class="box-body">
      <div class="pull-left">
        {{ link_to_route('crecursos.access.concept.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
  {{ Html::script('js/backend/plugin/inputmask/inputmask.js') }}
  {{ Html::script('js/backend/plugin/inputmask/inputmask.numeric.extensions.js') }}
  {{ Html::script('js/backend/plugin/inputmask/jquery.inputmask.js') }}

<script>
  $(function(){
   $(".time_programmed").inputmask("decimal", {
      groupSeparator: '.',
      autoGroup: true,
      rightAlign: false,
      suffix: ' Hrs',
    });
  });
</script>
@stop

