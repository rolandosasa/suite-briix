<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">{{ trans('labels.crecursos.access.personal.information-pers') }}</h3>
  </div><!-- /.box-header -->

  <div class="box-body">
    <div class="form-group">
      <div class="col-md-12">
        <div class="col-md-4 ">
          {!!Form::label('name',trans('validation.attributes.crecursos.access.personal.name').':')!!}
          {!!Form::text('name',null,['id' => 'name','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.name')])!!}
        </div>
        <div class="col-md-4 ">
          {!!Form::label('firstlastname',trans('validation.attributes.crecursos.access.personal.firstlastname').':')!!}
          {!!Form::text('firstlastname',null,['id' => 'firstlastname','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.firstlastname')])!!}
        </div>
        <div class="col-md-4 ">
          {!!Form::label('secondlastname',trans('validation.attributes.crecursos.access.personal.secondlastname').':')!!}
          {!!Form::text('secondlastname',null,['id' => 'secondlastname','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.firstlastname')])!!}
        </div>
      </div>
    </div>
        
    <div class="form-group">
      <div class="col-md-12">
        <div class="col-md-4 ">
          {!!Form::label('birthplace',trans('validation.attributes.crecursos.access.personal.birthplace').':')!!}
          {!!Form::text('birthplace',null,['id' => 'birthplace','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.birthplace')])!!}
         </div>
        <div class="col-md-2">
          {!!Form::label('birthdate',trans('validation.attributes.crecursos.access.personal.birthdate').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!!Form::text('birthdate',null,['id' => 'birthdate','required' => '','class'=>'form-control input-sm'])!!}
          </div>
        </div>
        <div class="col-md-2">
          {!!Form::label('age',trans('validation.attributes.crecursos.access.personal.age').':')!!}
          {!!Form::text('age',null,['id' => 'age','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.age')])!!}
        </div>
        <div class="col-md-2">
          {!!Form::label('civil_status',trans('validation.attributes.crecursos.access.personal.civil-status').':')!!}
          {!!Form::text('civil_status',null,['id' => 'civil-status','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.civil-status')])!!}
        </div>
        <div class="col-md-2">
          {!!Form::label('gender',trans('validation.attributes.crecursos.access.personal.gender').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
            {!!Form::select('gender', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['id'=>'gender', 'class' => 'form-control', 'placeholder'=>trans('validation.attributes.crecursos.access.personal.selection')])!!}
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <div class="col-md-4">
          {!!Form::label('address',trans('validation.attributes.crecursos.access.personal.address').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home"></i></span>
          {!!Form::text('address',null,['id' => 'address','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.address')])!!}
          </div>
        </div>
        <div class="col-md-4">
          {!!Form::label('email',trans('validation.attributes.crecursos.access.personal.email').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            {!!Form::text('email',null,['id' => 'email','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.email')])!!}
          </div>
        </div>
        <div class="col-md-4">
          {!!Form::label('phone',trans('validation.attributes.crecursos.access.personal.phone').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            {!!Form::text('phone',null,['id' => 'phone','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.phone')])!!}
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <div class="col-md-4">
          {!!Form::label('photo',trans('validation.attributes.crecursos.access.personal.photo').':')!!}
          {!!Form::file('photo',null,['id' => 'phone','required' => '','class'=>'form-control input-sm'])!!}
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <div class="col-md-4">
          {!!Form::label('curp',trans('validation.attributes.crecursos.access.personal.curp').':')!!} 
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
              {!!Form::text('curp',null,['id' => 'curp','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.curp')])!!}
            </div>
        </div>
        <div class="col-md-4">
          {!!Form::label('rfc',trans('validation.attributes.crecursos.access.personal.rfc').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
            {!!Form::text('rfc',null,['id' => 'rfc','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.rfc')])!!}
          </div>
        </div>
        <div class="col-md-4">
          {!!Form::label('imss',trans('validation.attributes.crecursos.access.personal.imss').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
            {!!Form::text('imss',null,['id' => 'imss','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.imss')])!!}
          </div>
        </div>
      </div>
    </div>

  </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">{{ trans('labels.crecursos.access.personal.information-prof') }}</h3>
  </div><!-- /.box-header -->

  <div class="box-body">
    <div class="form-group">
      <div class="col-md-12">
        <div class="col-md-4">
          {!!Form::label('level_studies',trans('validation.attributes.crecursos.access.personal.level-studies').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-book"></i></span>
            {!!Form::select('level_studies', array('Primaria' => 'Primaria', 'Secundaria' => 'Secuandaria', 'Bachillerato' => 'Bachillerato', 'Técnico' => 'Técnico', 'Licenciatura' => 'Licenciatura', 'Maestría' => 'Maestría', 'Doctorado' => 'Doctorado', ), null, ['id'=>'level_studies', 'class' => 'form-control', 'placeholder'=>trans('validation.attributes.crecursos.access.personal.selection')])!!}
          </div>
        </div>
        <div class="col-md-4">
          {!!Form::label('school',trans('validation.attributes.crecursos.access.personal.school').':')!!}
          {!!Form::text('school',null,['id' => 'school','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.school')])!!}
        </div>
         <div class="col-md-4">
          {!!Form::label('career',trans('validation.attributes.crecursos.access.personal.career').':')!!}
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-mortar-board"></i></span>
            {!!Form::text('career',null,['id' => 'school','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.career')])!!}
          </div>          
        </div>
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-md-12">
        <div class="col-md-4">
          {!!Form::label('identity_card',trans('validation.attributes.crecursos.access.personal.identity-card').':')!!} 
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
              {!!Form::text('identity_card',null,['id' => 'identity_card','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.personal.identity-card')])!!}
            </div>
        </div>
      </div>
    </div>
    
  </div><!-- /.box-body -->
</div><!--box-->