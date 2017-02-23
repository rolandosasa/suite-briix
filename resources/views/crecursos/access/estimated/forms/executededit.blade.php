<div class="form-group">
  {{ Form::label('advance_percent', trans('validation.attributes.crecursos.access.estimated.advance_percent'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
    {{ Form::text('advance_percent', null, ['id' => 'advance_percent','required' => '','class' => 'form-control input-sm advance_percent', 'placeholder' => trans('validation.attributes.crecursos.access.estimated.advance_percent')]) }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('time_difference', trans('validation.attributes.crecursos.access.estimated.time_difference'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
    {{ Form::text('time_difference', null, ['id' => 'time_difference','required' => '','class' => 'form-control input-sm time_difference', 'placeholder' => trans('validation.attributes.crecursos.access.estimated.time_difference')]) }}
  </div>
</div>

<div style='display:none;'>
  {{ Form::text('time_programmed', null, ['id' => 'time_programmed', 'class' => 'form-control input-sm']) }}
</div>

