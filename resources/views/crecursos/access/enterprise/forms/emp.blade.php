<div class="form-group">
  {{ Form::label('rfc', trans('validation.attributes.crecursos.access.enterprises.rfc'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
      {{ Form::text('rfc', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.enterprises.rfc')]) }}
  </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
  {{ Form::label('name', trans('validation.attributes.crecursos.access.enterprises.name'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
      {{ Form::text('name_enterprise', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.enterprises.name')]) }}
  </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
  {{ Form::label('email', trans('validation.attributes.crecursos.access.enterprises.email'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
      {{ Form::text('email', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.enterprises.email')]) }}
  </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
  {{ Form::label('phone', trans('validation.attributes.crecursos.access.enterprises.phone'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
      {{ Form::text('phone', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.enterprises.phone')]) }}
  </div><!--col-lg-10-->
</div><!--form control-->

<div class="form-group">
  {{ Form::label('address', trans('validation.attributes.crecursos.access.enterprises.address'), ['class' => 'col-lg-2 control-label']) }}

  <div class="col-lg-10">
      {{ Form::text('address', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.enterprises.address')]) }}
  </div><!--col-lg-10-->
</div><!--form control-->

 <div class="form-group">
    {{ Form::label('status', trans('validation.attributes.crecursos.access.enterprises.associated_department'), ['class' => 'col-lg-2 control-label']) }}

@if($value)
  <div class="col-lg-3">
    @if (count($departments) > 0)
      @foreach($departments as $department)
        <input type="checkbox" value="{{ $department->id }}" name="assignees_departments[]" {{in_array($department->id, $enterprise_departments) ? 'checked' : ''}} id="department-{{ $department->id }}" /> 
        <label for="department-{{ $department->id }}">{{ $department->name_department }}</label>
        <br/>
      @endforeach
    @else
      {{ trans('labels.crecursos.access.enterprise.no_departments') }}
    @endif
  </div><!--col-lg-3-->
  
@else
  <div class="col-lg-3">
    @if (count($departments) > 0)
      @foreach($departments as $department)
        <input type="checkbox" value="{{ $department->id }}" name="assignees_departments[]" id="department-{{ $department->id }}" /> 
        <label for="department-{{ $department->id }}">{{ $department->name_department }}</label>
        <br/>
      @endforeach
    @else
      {{ trans('labels.crecursos.access.enterprise.no_departments') }}
    @endif
  </div><!--col-lg-3-->
@endif
  
</div><!--form control-->


