<div class="col-md-12">
      <div id="content">
      <div class="container">
        <div class="page-content">
          <!-- Divider -->
          <div class="hr1" style="margin-bottom:45px;"></div>

          <div class="row">

            <div class="col-md-10">
              <!-- Accordion -->
              <div class="panel-group" id="accordion">

                <!-- Start Accordion 1 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-one" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#F56908';">
                        {{ trans('labels.crecursos.access.humanresources.applicant') }}
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-one" class="panel-collapse collapse in">
                    <div class="panel-body" style="font-size:14px;">
                          <div class="form-group">
                          {{ Form::label('date', trans('validation.attributes.crecursos.access.humanresources.date'), ['class' => 'col-lg-2 control-label']) }}

                          <div class="col-lg-4">
                             {{ Form::date('date', null)}}
                          </div><!--col-lg-10-->
                          {{ Form::label('department', trans('validation.attributes.crecursos.access.humanresources.department'), ['class' => 'col-lg-2 control-label']) }}

                          <div class="col-lg-4">
                              {{ Form::select('department',array('uno' => 'uno','dos'=> 'dos'), null, ['id'=>'department','class' => 'form-control', 'placeholder'=> 'Seleccione']) }}
                          </div>
                      </div><!--form control-->

                      <div class="form-group">
                          {{ Form::label('applicant_name', trans('validation.attributes.crecursos.access.humanresources.applicant_name'), ['class' => 'col-lg-2 control-label']) }}
                          <div class="col-lg-4">
                          {{ Form::text('applicant_name', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.applicant_name')]) }}
                          </div>
                          {{ Form::label('cargo', trans('validation.attributes.crecursos.access.humanresources.cargo'), ['class' => 'col-lg-2 control-label']) }}
                          <div class="col-lg-4">
                          {{ Form::text('cargo', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.cargo')]) }}
                          </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('vacant_name', trans('validation.attributes.crecursos.access.humanresources.vacant_name'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                        {{ Form::text('vacant_name', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.vacant_name')]) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('reason', trans('validation.attributes.crecursos.access.humanresources.reason'), ['class' => 'col-lg-4 control-label'])}}
                      </div>
                      <div class="form-group">
                        <div class="col-lg-2">
                        </div>
                        {{ Form::textarea('reason', null, ['class' => 'col-lg-6 input-sm','placeholder' => 'Escriba el motivo por el cual esta solicitando la vacante...'])}}
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Accordion 1 -->
                <!-- Start Accordion 2 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-tow" class="collapsed" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';">
                        {{ trans('labels.crecursos.access.humanresources.assigned') }}
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-tow" class="panel-collapse collapse">
                      <br>
                      <div class="form-group">
                        {{ Form::label('department_a', trans('validation.attributes.crecursos.access.humanresources.department'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                        {{ Form::select('department_a', array('uno' => 'uno','dos'=> 'dos'), null, ['id'=>'department_a','class' => 'form-control', 'placeholder'=> 'Seleccione']) }}
                        </div>
                        
                     </div>
                     <div class="form-group">
                        {{ Form::label('manager', trans('validation.attributes.crecursos.access.humanresources.manager'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                        {{ Form::text('manager', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.manager')]) }}
                        </div>
                        {{ Form::label('position', trans('validation.attributes.crecursos.access.humanresources.position'), ['class' => 'col-lg-1 control-label']) }}
                        <div class="col-lg-4">
                        {{ Form::text('position', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.position')]) }}
                        </div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('phone', trans('validation.attributes.crecursos.access.humanresources.phone'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                        {{ Form::text('phone', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.phone')]) }}
                        </div>
                          {{ Form::label('email', trans('validation.attributes.crecursos.access.humanresources.email'), ['class' => 'col-lg-1 control-label']) }}
                        <div class="col-lg-4">
                        {{ Form::text('email', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.email')]) }}
                        </div>
                     </div>
                  </div>
                </div>
                <!-- End Accordion 2 -->
                <!-- Start Accordion 3 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-three" class="collapsed" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';">
                         {{ trans('labels.crecursos.access.humanresources.candidate') }}
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-three" class="panel-collapse collapse">
                     <br>
                     <div class="form-group">
                      <div class="col-md-10">
                        <div class="col-md-5">
                              {{ Form::label('genre', trans('validation.attributes.crecursos.access.humanresources.genre').':') }}
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                               {!!Form::select('genre', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['id'=>'genre', 'class' => 'form-control', 'placeholder'=>trans('validation.attributes.crecursos.access.Select.Select')])!!}
                          </div>
                        </div>
                        <div class="col-md-5">
                          {{ Form::label('civil_state', trans('validation.attributes.crecursos.access.humanresources.civil_state').':') }}
                              {{ Form::select('civil_state', array('Casado' => 'Casado(a)', 'Soltero' => 'Soltero(a)', 'Divorciado' => 'Divorciado(a)', 'Viudo' => 'Viudo(a)', 'Indistinto' => 'Indistinto'),null,['id'=>'civil_state', 'class' => 'form-control', 'placeholder'=>trans('validation.attributes.crecursos.access.Select.Select')]) }}
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-10">
                      <div class="col-md-5">
                         {{ Form::label('level_education', trans('validation.attributes.crecursos.access.humanresources.level_education').':') }}
                         <div class="input-group">
                           {{ Form::select('level_education', array('Nivel de estudios' => 'Nivel de estudios', 'Primaria' => 'Primaria', 'Secundaria' => 'Secundaria', 'Bachillerato' => 'Bachillerato', 'Licenciatura' => 'Licenciatura', 'Especialidad' => 'Posgrado' , 'Maestria' => 'Maestría', 'Doctorado' => 'Doctorado'),null,['id'=>'level_education', 'class' => 'form-control', 'placeholder'=>trans('validation.attributes.crecursos.access.Select.Select')]) }}
                         </div>
                       </div>
                      <div class="col-md-5">
                          {{ Form::label('career', trans('validation.attributes.crecursos.access.humanresources.career').':') }}
                          {{ Form::text('career', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.career')]) }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <!-- End Accordion 3 -->
                <!-- Start Accordion 4 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-four" class="collapsed" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';">
                        Datos de la vacante
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-four" class="panel-collapse collapse">
                    <div class="panel-body" style="font-size:14px;">
                      <div class="form-group">
                         {{ Form::label('quantity', trans('validation.attributes.crecursos.access.humanresources.quantity'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                          {{ Form::text('quantity', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.quantity')]) }}
                        </div>
                          {{ Form::label('department2', trans('validation.attributes.crecursos.access.humanresources.department2'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                         {{ Form::text('department2', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.department2')]) }}
                        </div>
                      </div>
                      <div class="form-group">
                          {{ Form::label('state_id', trans('validation.attributes.crecursos.access.humanresources.state_id'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                          {{ Form::select('state_id', $State, null, ['id'=>'state_id', 'class' => 'form-control', 'placeholder'=>trans('validation.attributes.crecursos.access.personal.selection')]) }}
                        </div>
                         {{ Form::label('city',trans('validation.attributes.crecursos.access.humanresources.city'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                         {{ Form::select('city', $Municipality , null, ['id'=>'nivelreq', 'class' => 'form-control', 'placeholder'=>trans('validation.attributes.crecursos.access.personal.selection')]) }}
                        </div>
                      </div>
                      <div class="form-group">
                          {{ Form::label('schedule', trans('validation.attributes.crecursos.access.humanresources.schedule'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">            
                          {{ Form::text('schedule', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.schedule')]) }}
                        </div> 
                          {{ Form::label('working_days', trans('validation.attributes.crecursos.access.humanresources.working_days'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                          {{ Form::text('working_days', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.working_days')] )}}
                        </div>
                      </div>   
                      <div class="form-group">
                          {{ Form::label('position2', trans('validation.attributes.crecursos.access.humanresources.position2'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                          {{ Form::text('position2', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.position2')]) }}
                        </div>
                          {{ Form::label('lenguages', trans('validation.attributes.crecursos.access.humanresources.lenguages'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4">
                          {{ Form::text('lenguages', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.lenguages')]) }}
                        </div>
                      </div>
                      <div class="form-group">
                          {{ Form::label('basic_salary', trans('validation.attributes.crecursos.access.humanresources.basic_salary'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4" >
                          {{ Form::text('basic_salary', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.basic_salary')]) }}
                        </div>
                          {{ Form::label('overall_salary', trans('validation.attributes.crecursos.access.humanresources.overall_salary'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4" >
                          {{ Form::text('overall_salary', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.overall_salary')]) }}
                        </div>
                      </div>
                      <div class="form-group">
                          {{ Form::label('age_range', trans('validation.attributes.crecursos.access.humanresources.age_range'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-2" >
                          {{ Form::text('age_range', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.age_range')]) }}
                        </div>
                          {{ Form::label('description', trans('validation.attributes.crecursos.access.humanresources.description'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-4" >
                          {{ Form::textarea('description', null, ['class'=> 'input-sm','placeholder' => trans('validation.attributes.crecursos.access.humanresources.description')]) }}
                        </div>
                      </div>                  
                    </div>
                  </div>
                </div>
            <!-- End Accordion 4 -->
                 <!-- Start Accordion 5 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-five" class="collapsed" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';">
                         {{ trans('menus.crecursos.humanresources.requirements') }}
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-five" class="panel-collapse collapse">
                  <br>
                      <div class="form-group">
                          <div class="col-lg-2">
                          </div>
                          <div class="col-lg-10">
                            <div class="col-md-4 form-group">
                              {{ Form::label('requestv', trans('validation.attributes.crecursos.access.humanresources.requestv')) }}
                              {{ Form::text('requestv', null, ['class' => 'form-control input-sm', 'id' => 'requestv', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.requestv')]) }}
                            </div>              
                            <div class="col-md-4 form-group">
                               {{ Form::label('nivelreq', trans('validation.attributes.crecursos.access.humanresources.nivelreq')) }}
                                  {{ Form::text('nivelreq', null, ['class' => 'form-control input-sm', 'id' => 'nivelreq', 'placeholder' => trans('validation.attributes.crecursos.access.humanresources.nivelreq')]) }}
                            </div> 
                            <div class="col-md-6 form-group">
                              <INPUT type="button" value="Agregar" onclick="myCreateFunction();" />
                            </div>
                            <div class="col-md-6 form-group">
                            <INPUT type="button" value="Eliminar" onclick="myDeleteFunction();" /> 
                            </div>
                            <div class="col-md-12 form-group">
                              <table id="myTable" class="table5 table-striped table-bordered table-hover" >
                               <thead>
                                  <th>Requisito</th>
                                  <th>Nivel requerido </th>
                              </thead>
                              </table>
                            </div>
                         </div>
                      </div>
                      
                  </div>
                </div>
            
          <!-- End Accordion 5 -->
         </div>
        </div>
      </div>
            <!-- Classic Heading -->
              
          <!-- Divider -->
          <div class="hr1" style="margin-bottom:25px;"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function myCreateFunction() {
          var table = document.getElementById("myTable");
          var count = document.getElementById("myTable").getElementsByTagName("tr").length;
          //alert(count);
          var suma=0;
          if (count==null)
            {count=0;}
          var row = table.insertRow(1);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);

          var valor1=document.getElementById("requestv").value;
          var valor2=document.getElementById("nivelreq").value;
         
          cell1.innerHTML="<td><input type='text' size='20' id='requestv["+count+"]' name='requestv["+count+"]' value='"+valor1+"'/></td>";
          //cell1.innerHTML= 
         cell2.innerHTML="<td><input type='text' size='20' id='nivelreq"+count+"' name='nivelreq["+count+"]' value='"+valor2+"'/></td>";
      }

     
       function myDeleteFunction() {
        
          document.getElementById("myTable").deleteRow(1);
          calcular();
      }
  </script>