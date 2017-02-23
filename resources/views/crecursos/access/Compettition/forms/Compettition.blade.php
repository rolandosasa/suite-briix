<div class="form-group">
   {{ Form::label('category', trans('validation.attributes.crecursos.access.compettition.category'), ['class' => 'col-lg-2 control-label']) }}

<div class="col-lg-4">
    {{ Form::text('category', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.compettition.category')]) }}
</div><!--col-lg-10-->
   {{ Form::label('name', trans('validation.attributes.crecursos.access.compettition.name'), ['class' => 'col-lg-2 control-label']) }}

<div class="col-lg-4">
  {{ Form::text('name', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.compettition.name')]) }}
</div>

</div><!--form control-->

<div class="form-group">
   {{ Form::label('type', trans('validation.attributes.crecursos.access.compettition.type'), ['class' => 'col-lg-2 control-label']) }}

<div class="col-lg-4">
	<div class="input-group">
    {{ Form::select('type', array('Competencia' => 'Competencia', 'Habilidad' => 'Habilidad' ),null, ['placeholder' => 'seleccione','class'=> 'form-control'])}}
    </div>
</div><!--col-lg-10-->
</div><!--form control-->

