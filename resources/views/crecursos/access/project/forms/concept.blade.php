@if($val)
	@foreach($project_concepts as $project => $value)
		<div class="form-group" id="{{$value->id}}">
		  {{ Form::label('name_concept'.$value->id, trans('validation.attributes.crecursos.access.concept.name'), ['class' => 'col-lg-2 control-label']) }}

		  <div class="col-lg-8 input-group input-group-sm">
		    {{ Form::text('name_concepts_up[]', $value->name_concept, ['class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.concept.name')]) }}
		     <div clas="" style="display:none;">
						{{ Form::text('id_concepts_up[]', $value->id) }}
		     </div>

		    <span class="input-group-btn">
		      <button type="button" class="btn btn-danger btn-flat" onclick="RemoverCamposUp('{{$value->id}}')">X</button>
		    </span>
		  </div><!--col-lg-10-->
		</div><!--form control-->
	@endforeach
@else
	<div class="form-group" id="campo1">
	  {{ Form::label('name_concept' . 1, trans('validation.attributes.crecursos.access.concept.name'), ['class' => 'col-lg-2 control-label']) }}

	  <div class="col-lg-8 input-group input-group-sm">
	    {{ Form::text('name_concepts[]', null, ['class' => 'form-control input-sm', 'required' => '', 'placeholder' => trans('validation.attributes.crecursos.access.concept.name')]) }}
	    <span class="input-group-btn">
	      <button type="button" class="btn btn-danger btn-flat" onclick="RemoverCampos('1')">X</button>
	    </span>
	  </div><!--col-lg-10-->
	</div><!--form control-->
@endif

<div id="campos">
</div>