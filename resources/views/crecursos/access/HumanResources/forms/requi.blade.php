 {{ Form::open(['route' => 'admin.access.requirements.store', 'class' => 'form-horizontal', 'requirements' => 'form', 'method' => 'post', 'id' => 'create-requirements']) }}
 <!-- {!! Html::script('js/agregarLi.js')!!} -->
 <div class="form-group">
        {{ Form::label('requestv', trans('validation.attributes.backend.access.humanresources.requestv'), ['class' => 'col-lg-2 control-label']) }}
     <div class="col-lg-3">
        {{ Form::text('requestv', null, ['class' => 'form-control input-sm', 'id' => 'requestv', 'placeholder' => trans('validation.attributes.backend.access.humanresources.requestv')]) }}
     </div>
     <!-- Elementos del nivel requerido -->
        {{ Form::label('nivelreq', trans('validation.attributes.backend.access.humanresources.nivelreq'), ['class' => 'col-lg-2 control-label']) }}
     <div class="col-lg-5">
        {{ Form::select('nivelreq', array('Basico' => 'Basico', 'Intermedio' => 'Intermedio' , 'Avanzado' => 'Avanzado'), ['id' => 'nivelreq'])}}
     </div>
 </div>
 <div class="pull-right">
       {{ Form::submit(trans('buttons.general.crud.a'), ['class' => 'btn btn-success btn-xs', 'onclick'=>'return add_li()']) }}
 </div>
 <div class="form-group">
     <div class="col-lg-4">
        <ul id="listaDesordenada">
        </ul>
     </div>         
 </div>
 {{ Form::close() }}

