@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.project.management') . ' | ' . trans('labels.crecursos.access.project.edit'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datepicker/datepicker3.css") }}
@stop

@section('page-header')
  <h1>
      {{ trans('labels.crecursos.access.project.management') }}
      <small>{{ trans('labels.crecursos.access.project.edit') }}</small>
  </h1>
@endsection

@section('content')
  {{ Form::model($project, ['route' => ['crecursos.access.project.update', $project], 'class' => 'form-horizontal', 'Project' => 'form', 'method' => 'PATCH', 'id' => 'edit-Project']) }}

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.crecursos.access.project.information-project') }}</h3>
    </div><!-- /.box-header -->

    <div class="box-body">
      @include('crecursos.access.project.forms.project')
    </div><!-- /.box-body -->
  </div><!--box-->

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.crecursos.access.project.concepts') }}</h3>   
      <div class="pull-right">
        {{ Form::button(trans('buttons.crecursos.access.project.add'), ['class' => 'btn btn-success btn-xs', 'onclick' => 'AgregarCampos()']) }}
      </div>    
    </div><!-- /.box-header -->

    <div class="box-body">
      @include('crecursos.access.project.forms.concept')
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
  {{ Html::script('js/backend/plugin/datepicker/bootstrap-datepicker.js') }}
  {{ Html::script('js/backend/plugin/inputmask/inputmask.js') }}
  {{ Html::script('js/backend/plugin/inputmask/inputmask.numeric.extensions.js') }}
  {{ Html::script('js/backend/plugin/inputmask/jquery.inputmask.js') }}
  
  <script>
    $(function () {
      //Date picker
      $('#date_init').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true
      });

      $('#date_end').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true
      });

      $('#total_amount').inputmask("currency", {
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        autoGroup: true,
        prefix: '',
        rightAlign: false,
        oncleared: function () { self.Value(' ');}
      });

      $('#advance').inputmask("currency", {
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        autoGroup: true,
        prefix: '',
        rightAlign: false,
        oncleared: function () { self.Value(' ');}
      });
    });
  </script>

  <script >
    var nextinput = 2;
    function AgregarCampos(){
      nextinput++;
      input = 'campo'+nextinput;
      campo = 
        '<div class="form-group" id="'+input+'">{{ Form::label("name_concept'+nextinput+'", trans('validation.attributes.crecursos.access.concept.name'), ['class' => 'col-lg-2 control-label']) }} <div class="col-lg-8 input-group input-group-sm">' + '{{ Form::text("name_concepts[]", null, ['class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.concept.name')]) }} <span class="input-group-btn"><button type="button" class="btn btn-danger btn-flat" onclick = "RemoverCampos('+nextinput+')">X</button></span></div></div>';
      $("#campos").append(campo);
    }

    function RemoverCamposUp(id){
      $('#'+id).remove();
    }

    function RemoverCampos(id){
      $('#'+'campo'+id).remove();
    }
  </script>
@stop

