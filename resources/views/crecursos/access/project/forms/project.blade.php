<div class="form-group">
  {{ Form::label('name_project', trans('validation.attributes.crecursos.access.project.name'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
      {{ Form::text('name_project', null, ['class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.project.name')]) }}
  </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
  {{ Form::label('description', trans('validation.attributes.crecursos.access.project.description'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
      {{ Form::text('description', null, ['class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.project.description')]) }}
  </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
  {{ Form::label('contractor', trans('validation.attributes.crecursos.access.project.contract'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
      {{ Form::text('contractor', null, ['class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.project.contract')]) }}
  </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
  {{ Form::label('date_init', trans('validation.attributes.crecursos.access.project.date_init'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-4">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
      {{ Form::text('date_init', null, ['id' => 'date_init', 'class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.project.date_init')]) }}
    </div>
  </div><!--col-lg-10-->

  {{ Form::label('date_end', trans('validation.attributes.crecursos.access.project.date_end'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-4">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
      {{ Form::text('date_end', null, ['id' => 'date_end', 'class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.project.date_end')]) }}
    </div>
  </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
  {{ Form::label('total_amount', trans('validation.attributes.crecursos.access.project.total_amount'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-4">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
      {{ Form::text('total_amount', null, ['id' => 'total_amount', 'class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.project.total_amount')]) }}
    </div>
  </div><!--col-lg-10-->

  {{ Form::label('advance', trans('validation.attributes.crecursos.access.project.advance'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-4">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
      {{ Form::text('advance', null, ['id' => 'advance', 'class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.project.advance')]) }}
    </div>
  </div><!--col-lg-10-->
</div><!--form control-->


