<div class="form-group">
  {{ Form::label('time_programmed', trans('validation.attributes.crecursos.access.estimated.time_programmed'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
    {{ Form::text('time_programmed', null, ['id' => 'time_programmed','required' => '','class' => 'form-control input-sm time_programmed', 'placeholder' => trans('validation.attributes.crecursos.access.estimated.time_programmed')]) }}
  </div>
</div>