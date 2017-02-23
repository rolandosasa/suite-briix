@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.concept.management') . ' | ' . trans('labels.crecursos.access.concept.edit'))

@section('page-header')
  <h1>
      {{ trans('labels.crecursos.access.concept.management') }}
      @if($executed)
      <small>{{ trans('labels.crecursos.access.concept.main-h') }}</small>
      @else
      <small>{{ trans('labels.crecursos.access.concept.main-p') }}</small>
      @endif
  </h1>
@endsection

@section('content')
  {{ Form::model($estimated, ['route' => ['crecursos.access.estimated.update', $estimated], 'class' => 'form-horizontal', 'Enterprise' => 'form', 'method' => 'PATCH', 'id' => 'edit-Enterprise']) }}

    <div class="box box-success">
      <div class="box-header with-border">
          <h3 class="box-title">{{ trans('labels.crecursos.access.concept.edit') }}</h3>
      </div><!-- /.box-header -->

      <div class="box-body">
        @if($executed)
          @include('crecursos.access.estimated.forms.estimatededit')
        @else
          @include('crecursos.access.estimated.forms.executededit')
        @endif
      </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
      <div class="box-body">
          <div class="pull-left">
            {{ link_to_route('crecursos.access.project.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
  {{ Html::script('js/backend/plugin/inputmask/inputmask.js') }}
  {{ Html::script('js/backend/plugin/inputmask/inputmask.numeric.extensions.js') }}
  {{ Html::script('js/backend/plugin/inputmask/jquery.inputmask.js') }}

<script>
  $(function(){
   $(".time_difference").inputmask("decimal", {
      groupSeparator: '.',
      autoGroup: true,
      rightAlign: false,
      suffix: ' Hrs',
    });

   $(".advance_percent").inputmask("decimal", {
      groupSeparator: '.',
      autoGroup: true,
      rightAlign: false,
      suffix: ' %',
    });

  });

</script>
@stop