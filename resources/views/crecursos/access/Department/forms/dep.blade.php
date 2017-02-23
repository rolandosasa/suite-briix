<div class="form-group">
  {{ Form::label('name_department', trans('validation.attributes.crecursos.access.department.name_department'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
    {{ Form::text('name_department', null, ['id' => 'name_department','required' => '','class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.department.name_department')]) }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('area', trans('validation.attributes.crecursos.access.department.area') , ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
    {{ Form::text('area', null, ['id' => 'area','required' => '','class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.department.area')]) }}
  </div>
</div>
<div class="form-group">
  {{ Form::label('description', trans('validation.attributes.crecursos.access.department.description') , ['class' => 'col-lg-2 control-label']) }}
  <div class="col-lg-10">
    {{ Form::text('description', null, ['id' => 'description','class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.department.description')]) }}
  </div>
</div>

              