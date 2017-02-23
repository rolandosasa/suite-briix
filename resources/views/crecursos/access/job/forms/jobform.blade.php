<div class="box-body">
  <div class="form-group">
  	<div class="col-md-12">
  		<div class="col-md-6">
  		  {!!Form::label('name_jobs',trans('validation.attributes.crecursos.access.job.name_jobs').':')!!}
  		  <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
          {!!Form::text('name_jobs',null,['id' => 'name_jobs','required' => '','class'=>'form-control input-sm','placeholder'=>trans('validation.attributes.crecursos.access.job.name_jobs')])!!}
          </div>
  		</div>
  		<div class="col-md-6">
  			{{ Form::label('department', trans('validation.attributes.crecursos.access.job.department').':')}}
  			<div class="input-group">
  				<span class="input-group-addon"><i class="fa fa-archive"></i></span>
  			  {{Form::text('department',null,['id'=>'department', 'required' => '','class'=> 'form-control input-sm','placeholder' => trans('validation.attributes.crecursos.access.job.department')])}}
  			</div>
  		</div>
  	</div>
  </div>
  <div class="form-group">
  	  <div class="col-md-12">
  	  	<div class="col-md-6">
  			{{ Form::label('immediate_boss', trans('validation.attributes.crecursos.access.job.immediate_boss').':')}}
  			<div class="input-group">
  			  <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
  			  {{Form::text('immediate_boss',null,['id'=>'immediate_boss', 'required' => '','class'=> 'form-control input-sm','placeholder' => trans('validation.attributes.crecursos.access.job.immediate_boss')])}}
  			</div>
  		</div>
  		<div class="col-md-6">
  			{{Form::label('supervises',trans('validation.attributes.crecursos.access.job.supervises'))}}
  			<div class="input-group">
  			  <span class="input-group-addon"><i class="fa fa-users"></i></span>
  			  {{Form::text('supervises',null,['id'=>'supervises', 'required' => '','class'=> 'form-control input-sm','placeholder' => trans('validation.attributes.crecursos.access.job.supervises')])}}
  			</div>
  		</div>
  	  </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <div class="col-md-6">
        {{Form::label('salary_basic',trans('validation.attributes.crecursos.access.job.salary').':')}}
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-money" ></i></span>
          {{Form::text('salary_basic',null,['id'=>'salary', 'required' => '','class'=> 'form-control input-sm','placeholder' => trans('validation.attributes.crecursos.access.job.salary')])}}
        </div>
      </div>
      <div class="col-md-6">
        {{Form::label('salary_global',trans('validation.attributes.crecursos.access.job.salary_g').':')}}
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
          
          {{Form::text('salary_global',null,['id'=>'salary_g', 'required' => '','class'=> 'form-control input-sm','placeholder' => trans('validation.attributes.crecursos.access.job.salary_g')])}}
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
  	<div class="col-md-12">
       <div class="col-md-6">
         {{Form::label('job_description',trans('validation.attributes.crecursos.access.job.job_description').':')}}
          {{Form::textarea('job_description',null,['id'=>'job_description','required' => '','class'=>'form-control input-sm','placeholder'=> trans('validation.attributes.crecursos.access.job.job_description')])}}
       </div>
  	   <div class="col-md-6">
  	   	{{Form::label('responsabilities',trans('validation.attributes.crecursos.access.job.responsabilities').':')}}
  	   		{{Form::textarea('responsabilities',null,['id'=>'responsabilities','required' => '','class'=>'form-control input-sm','placeholder'=> trans('validation.attributes.crecursos.access.job.responsabilities')])}}
  	   </div>
  	</div>
  </div>
</div>