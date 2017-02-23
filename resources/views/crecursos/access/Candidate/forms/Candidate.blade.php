{!! Html::script('js/agregarLi.js')!!}
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
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-one" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';">
                        <i onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';"></i> Datos del candidato
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-one" class="panel-collapse collapse in">
                    <div class="panel-body" style="font-size:14px;">
                        <div class="form-group">
                            <div class="col-md-4">
                             {{ Form::label('namecan', trans('validation.attributes.crecursos.access.candidate.namecan')) }}
                            
                             {{ Form::text('namecan', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.namecan')]) }}
                            </div><!--col-lg-10-->
                            <div class="col-md-4">
                              {{ Form::label('laveleducation', trans('validation.attributes.crecursos.access.candidate.laveleducation')) }}
                              <div class="input-group">
                                {{ Form::select('laveleducation', array('Nivel de estudios' => 'Nivel de estudios', 'Primaria' => 'Primaria', 'Secundaria' => 'Secundaria', 'Bachillerato' => 'Bachillerato', 'Licenciatura' => 'Licenciatura', 'Especialidad' => 'Posgrado' , 'Maestria' => 'Maestría', 'Doctorado' => 'Doctorado'),null,['class' => 'form-control']) }}
                              </div><!--input-group-->
                            </div>
                            <div class="col-md-4">
                              {{ Form::label('school', trans('validation.attributes.crecursos.access.candidate.school')) }}

                              {{ Form::text('school', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.school')]) }}
                            </div>
                         </div>
                         <div class="form-group">
                            <div class="col-md-4">
                              {{ Form::label('career', trans('validation.attributes.crecursos.access.candidate.career')) }}

                              {{ Form::text('career', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.career')]) }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::label('identitycard',trans('validation.attributes.crecursos.access.candidate.identitycard')) }}

                                {{ Form::text('identitycard', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.identitycard')]) }}
                              </div>
                              <div class="col-lg-4">
                                {{ Form::label('curp',trans('validation.attributes.crecursos.access.candidate.curp')) }}

                                {{ Form::text('curp', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.curp')]) }}
                              </div>
                         </div>
                        <div class="form-group">
                              <div class="col-lg-4">
                                {{ Form::label('rfccandidate',trans('validation.attributes.crecursos.access.candidate.rfccandidate')) }}
                            
                                {{ Form::text('rfccandidate', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.rfccandidate')]) }}
                              </div>
                              <div class="col-md-4">
                               {{ Form::label('phonecel', trans('validation.attributes.crecursos.access.candidate.phonecel').':') }}
                               <div class="input-group" >
                               <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                               {{ Form::text('phonecel', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.phonecel')]) }}
                               </div>
                            </div>
                            <div class="col-md-4">
                              {{ Form::label('phonehome',trans('validation.attributes.crecursos.access.candidate.phonehome').':') }}
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                              {{ Form::text('phonehome', null, ['class' => 'form-control input-sm', 'placeholder' =>trans('validation.attributes.crecursos.access.candidate.phonehome')]) }}
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                              {{ Form::label('genrecandidate', trans('validation.attributes.crecursos.access.humanresources.genre').':') }}
                             <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                               {!!Form::select('genrecandidate', array('M' => 'Masculino', 'F' => 'Femenino'), null, ['id'=>'genrecandidate', 'class' => 'form-control', 'placeholder'=>trans('validation.attributes.crecursos.access.Select.Select')])!!}
                             </div>
                            </div>
                            <div class="col-md-4">
                                {{ Form::label('civilstatecandidate',trans('validation.attributes.crecursos.access.candidate.civilstatecandidate')) }}
                             <div class="input-group">
                               {{ Form::select('civilstatecandidate', array('C' => 'Casado(a)', 'S' => 'Soltero(a)', 'D' => 'Divorciado(a)', 'V' => 'Viudo(a)'),null,['class'=> 'form-control', 'placeholder'=>'Seleccione']) }}
                             </div>
                          </div>
                          <div class="col-md-4">
                            {{ Form::label('birthday', trans('validation.attributes.crecursos.access.candidate.birthday')) }}
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              {!!Form::text('birthday',null,['id' => 'birthday','required' => '','class'=>'form-control input-sm'])!!}
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                              {{ Form::label('egacandidate',
                            trans('validation.attributes.crecursos.access.candidate.egacandidate')) }}

                              {{ Form::text('egacandidate', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.egacandidate')]) }}
                          </div>
                          <div class="col-md-4">
                             {{ Form::label('imss', trans('validation.attributes.crecursos.access.candidate.imss')) }}

                              {{ Form::text('imss', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.imss')]) }}
                          </div>
                          <div class="col-md-4">
                             {{ Form::label('address',
                          trans('validation.attributes.crecursos.access.candidate.address').':') }}
                                                    
                              {{ Form::text('address', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.address')]) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4">
                             {{ Form::label('state', 
                          trans('validation.attributes.crecursos.access.candidate.state')) }}
                            <div class="input-group">
                              {{ Form::select('state', $State , null,['class'=>'form-control','placeholder'=>'Seleccione'])}}
                            </div> 
                          </div>
                          <div class="col-lg-4">
                            {{ Form::label('citycandidate', trans('validation.attributes.crecursos.access.candidate.citycandidate')) }}
                            <div class="input-group">
                              {{ Form::select('citycandidate',$Municipality, null,['class'=>'form-control', 'placeholder'=>'Seleccione'])}}
                            </div> 
                          </div>
                          <div class="col-md-4">
                            {{ Form::label('colony', trans('validation.attributes.crecursos.access.candidate.colony')) }}

                            {{ Form::text('colony', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.colony')]) }}
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                {{ Form::label('email',                     trans('validation.attributes.crecursos.access.candidate.email')) }}

                                {{ Form::text('email', null, ['class' => 'form-control input-sm', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.email')]) }}
                            </div>
                            <div class="col-md-4">
                              
                            {{ Form::label('statuscandidate', trans('validation.attributes.crecursos.access.candidate.statuscandidate')) }}
                            <div>
                              {{ Form::select('statuscandidate', array('inicial' => 'Inicial', 'En proceso' => 'En proceso', 'Terminado' => 'Terminado'),null,['class'=>'form-control','placeholder'=>'Seleccione']) }}
                            </div>
                            </div>
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
                        <i onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';"></i> Competencias del candidato
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-tow" class="panel-collapse collapse">
                    <div class="panel-body" style="font-size:14px;">
                        <div class="form-group">
                          <div class="col-lg-2">
                          </div>
                          <div class="col-lg-10">
                            <div class="col-md-3 form-group">
                              {{ Form::label('applyfor', trans('validation.attributes.crecursos.access.candidate.applyfor')) }}
                              <div class="input-group">
                              {{ Form::select('applyfor', array('Si' => 'Si', 'No' => 'No'), null,['id' => 'applyfor', 'class' => 'form-control','placeholder'=>trans('validation.attributes.crecursos.access.Select.Select')])}}
                              </div>
                            </div>              
                            <div class="col-md-3 form-group">
                               {{ Form::label('category', trans('validation.attributes.crecursos.access.candidate.category')) }}
                              <div class="input-group">
                               {{ Form::select('category', array('Programacion' => 'Programación','ventas' => 'Ventas'),null,['id' => 'category','class' => 'form-control','placeholder'=>trans('validation.attributes.crecursos.access.Select.Select')]) }}
                              </div>
                            </div> 
                            <div class="col-md-3 form-group">
                               {{ Form::label('compettition', trans('validation.attributes.crecursos.access.candidate.compettition')) }}
                              <div class="input-group">
                               {{ Form::text('compettition',  null, ['class' => 'form-control input-sm', 'id' => 'compettition' , 'placeholder' => trans('validation.attributes.crecursos.access.candidate.compettition')]) }}
                              </div>
                            </div>
                            <div class="col-md-3 form-group">
                               {{ Form::label('levelReq', trans('validation.attributes.crecursos.access.candidate.levelReq')) }}
                              <div class="input-group">
                               {{ Form::select('levelReq', array('Basico' => 'Basico', 'Intermedio' => 'Intermedio' , 'Avanzado' => 'Avanzado'), null, ['id' => 'levelReq','class' => 'form-control','placeholder' => trans('validation.attributes.crecursos.access.Select.Select')])}}
                              </div>
                            </div>
                            <div class="col-md-6 form-group">
                              <INPUT type="button" value="Agregar" onclick="myCreateFunction();" />
                            </div>
                            <div class="col-md-6 form-group">
                            <INPUT type="button" value="Eliminar" onclick="myDeleteFunction();" /> 
                            </div>
                            <div class="col-md-12 form-group">
                              <table id="comTable" class="table5 table-striped table-bordered table-hover" >
                               <thead>
                                  <th>Solicitado</th>
                                  <th>Categoria </th>
                                  <th>Competencia</th>
                                  <th>Nivel</th>
                               </thead>
                              </table>
                            </div>
                         </div>
                       </div>
                    </div>
                  </div>
                </div>

                <script>
    function myCreateFunction() {
          var table = document.getElementById("comTable");
          var count = document.getElementById("comTable").getElementsByTagName("tr").length;
          //alert(count);
          var suma=0;
          if (count==null)
            {count=0;}
          var row = table.insertRow(1);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);

          var valor1=document.getElementById("applyfor").value;
          var valor2=document.getElementById("category").value;
          var valor3=document.getElementById("compettition").value;
          var valor4=document.getElementById("levelReq").value;
         
          cell1.innerHTML="<td><input type='text' size='20' id='applyfor["+count+"]' name='applyfor["+count+"]' value='"+valor1+"'/></td>";
          //cell1.innerHTML= 
         cell2.innerHTML="<td><input type='text' size='20' id='category"+count+"' name='category["+count+"]' value='"+valor2+"'/></td>";
         // cell2.innerHTML=
         cell3.innerHTML="<td><input type='text' size='20' id='compettition"+count+"' name='compettition["+count+"]' value='"+valor3+"'/></td>";
         // 
         cell4.innerHTML="<td><input type='text' size='20' id='levelReq"+count+"' name='levelReq["+count+"]' value='"+valor4+"'/></td>";
      }

     
       function myDeleteFunction() {
        
          document.getElementById("comTable").deleteRow(1);
          calcular();
      }
  </script>
                <!-- End Accordion 2 -->

                <!-- Start Accordion 3 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-three" class="collapsed" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';">
                        <i  onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';"></i> Habilidades del candidato
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-three" class="panel-collapse collapse">
                    <div class="panel-body" style="font-size:14px;">
                        <div class="form-group">
                          <div class="col-lg-2">
                          </div>
                          <div class="col-lg-10">
                            <div class="col-md-3 form-group">
                              {{ Form::label('applyfortwo', trans('validation.attributes.crecursos.access.candidate.applyfortwo')) }}
                              <div class="input-group">
                              {{ Form::select('applyfortwo', array('Si' => 'Si', 'No' => 'No'),null, ['id' => 'applyfortwo', 'class' => 'form-control','placeholder' => trans('validation.attributes.crecursos.access.Select.Select')])}}
                              </div>
                            </div>              
                            <div class="col-md-3 form-group">
                               {{ Form::label('categorytwo', trans('validation.attributes.crecursos.access.candidate.categorytwo')) }}
                              <div class="input-group">
                               {{ Form::select('categorytwo',array('Programacion' => 'Programación','ventas' => 'Ventas'),null, ['class' => 'form-control','placeholder' => 'Seleccione', 'id' => 'categorytwo']) }}
                             </div>
                            </div> 
                            <div class="col-md-3 form-group">
                               {{ Form::label('compettitiontwo', trans('validation.attributes.crecursos.access.candidate.compettitiontwo')) }}

                               {{ Form::text('compettitiontwo',  null, ['class' => 'form-control input-sm', 'id' => 'compettitiontwo' , 'placeholder' => trans('validation.attributes.crecursos.access.candidate.compettitiontwo')]) }}
                            </div>
                            <div class="col-md-3 form-group">
                               {{ Form::label('levelReqtwo', trans('validation.attributes.crecursos.access.candidate.levelReqtwo')) }}
                              <div class="input-group">
                               {{ Form::select('levelReqtwo', array('Basico' => 'Basico', 'Intermedio' => 'Intermedio' , 'Avanzado' => 'Avanzado'),null, ['id' => 'levelReqtwo','class' => 'form-control','placeholder' => trans('validation.attributes.crecursos.access.Select.Select')])}}
                              </div>
                            </div>
                            <div class="col-md-6 form-group">
                              <INPUT type="button" value="Agregar" onclick="myCreateFunctionHa();" />
                            </div>
                            <div class="col-md-6 form-group">
                            <INPUT type="button" value="Eliminar" onclick="myDeleteFunctionHa();" /> 
                            </div>
                            <div class="col-md-12 form-group">
                              <table id="habTable" class="table5 table-striped table-bordered table-hover" >
                               <thead>
                                  <th>Solicitado</th>
                                  <th>Categoria </th>
                                  <th>Competencia</th>
                                  <th>Nivel</th>
                              </thead>
                              </table>
                            </div>
                         </div>
                      </div> 
                    </div>
                  </div>
                </div>
<script>
    function myCreateFunctionHa() {
          var table = document.getElementById("habTable");
          var count = document.getElementById("habTable").getElementsByTagName("tr").length;
          //alert(count);
          var suma=0;
          if (count==null)
            {count=0;}
          var row = table.insertRow(1);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);

          var valor1=document.getElementById("applyfortwo").value;
          var valor2=document.getElementById("categorytwo").value;
          var valor3=document.getElementById("compettitiontwo").value;
          var valor4=document.getElementById("levelReqtwo").value;
         
          cell1.innerHTML="<td><input type='text' size='20' id='applyfortwo["+count+"]' name='applyfortwo["+count+"]' value='"+valor1+"'/></td>";
          //cell1.innerHTML= 
         cell2.innerHTML="<td><input type='text' size='20' id='categorytwo"+count+"' name='categorytwo["+count+"]' value='"+valor2+"'/></td>";
         // cell2.innerHTML=
         cell3.innerHTML="<td><input type='text' size='20' id='compettitiontwo"+count+"' name='compettitiontwo["+count+"]' value='"+valor3+"'/></td>";
         // 
         cell4.innerHTML="<td><input type='text' size='20' id='levelReqtwo"+count+"' name='levelReqtwo["+count+"]' value='"+valor4+"'/></td>";
      }

     
       function myDeleteFunctionHa() {
        
          document.getElementById("haTable").deleteRow(1);
          calcular();
      }
  </script>
                <!-- End Accordion 3 -->
                <!-- Start Accordion 4 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-four" class="collapsed" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';">
                        <i onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';"></i> Perfil social
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-four" class="panel-collapse collapse">
                    <div class="panel-body" style="font-size:14px;">
                          <div class="form-group">
                          <div class="col-lg-2">
                          </div>
                          <div class="col-lg-10">
                            <div class="col-md-5 form-group">
                              {{ Form::label('socialnetwork', trans('validation.attributes.crecursos.access.candidate.socialnetwork')) }}
                              {{ Form::text('socialnetwork',  null, ['class' => 'form-control input-sm', 'id' => 'socialnetwork' , 'placeholder' => trans('validation.attributes.crecursos.access.candidate.socialnetwork')]) }}
                            </div>              
                            <div class="col-md-5 form-group">
                               {{ Form::label('linkp', trans('validation.attributes.crecursos.access.candidate.linkp')) }}
                               <div class="input-group">
                               {{ Form::select('linkp',array('Facebook' => 'Facebook','YouTube' => 'YouTube','WhatsApp'=>'WhatsApp','LinkedIn'=>'LinkedIn','Instagram'=>'Instagram','Google+'=>'Google+','Twitter'=>'Twitter'),null, ['placeholder' => 'Seleccione', 'id' => 'linkp', 'class'=> 'form-control']) }}
                               </div>
                            </div> 
                            <div class="col-md-5 form-group">
                              <INPUT type="button" value="Agregar" onclick="myCreateFunctionSo();" />
                            </div>
                            <div class="col-md-5 form-group">
                            <INPUT type="button" value="Eliminar" onclick="myDeleteFunctionSo();" /> 
                            </div>
                            <div class="col-md-12 form-group">
                              <table id="soTable" class="table5 table-striped table-bordered table-hover" >
                               <thead>
                                  <th>Usuario</th>
                                  <th>Red social </th>
                              </thead>
                              </table>
                            </div>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
<script>
    function myCreateFunctionSo() {
          var table = document.getElementById("soTable");
          var count = document.getElementById("soTable").getElementsByTagName("tr").length;
          //alert(count);
          var suma=0;
          if (count==null)
            {count=0;}
          var row = table.insertRow(1);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
         

          var valor1=document.getElementById("socialnetwork").value;
          var valor2=document.getElementById("linkp").value;
          
         
          cell1.innerHTML="<td><input type='text' size='20' id='socialnetwork["+count+"]' name='socialnetwork["+count+"]' value='"+valor1+"'/></td>";
          //cell1.innerHTML= 
         cell2.innerHTML="<td><input type='text' size='20' id='linkp"+count+"' name='linkp["+count+"]' value='"+valor2+"'/></td>";
         // cell2.innerHTML=
        
      }

     
       function myDeleteFunctionSo() {
        
          document.getElementById("soTable").deleteRow(1);
          calcular();
      }
  </script>
                <!-- End Accordion 4 -->
                <!-- Start Accordion 5 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-five" class="collapsed" onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';">
                        <i onmouseover="javascript:this.style.color='#F56908';" onmouseout="javascript:this.style.color='#636060';"></i> Perfil laboral   
                      </a>
                    </h4>
                  </div>
                  <div id="collapse-five" class="panel-collapse collapse">
                    <div class="panel-body" style="font-size:14px;">
                          <div class="form-group">
                           {{ Form::label('enterprises', trans('validation.attributes.crecursos.access.candidate.enterprises'), ['class' => 'col-lg-2 control-label']) }}

                           <div class="col-lg-4" >
                            {{ Form::text('enterprises', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.enterprises')]) }}
                           </div>
                           {{ Form::label('activity', trans('validation.attributes.crecursos.access.candidate.activity'), ['class' => 'col-lg-2 control-label'])}}
                           <div class="col-lg-4" >
                           {{ Form::text('activity', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.activity')]) }}
                           </div>
                        </div>
                        <div class="form-group">
                           {{ Form::label('antiquity', trans('validation.attributes.crecursos.access.candidate.antiquity'), ['class' => 'col-lg-2 control-label']) }}

                           <div class="col-lg-4" >
                           {{ Form::text('antiquity', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.antiquity')]) }}
                           </div>
                            {{ Form::label('reference', trans('validation.attributes.crecursos.access.candidate.reference'), ['class' => 'col-lg-2 control-label'])}}
                           <div class="col-lg-4" >
                           {{ Form::text('reference', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.reference')]) }}
                            </div>
                        </div>
                        <div class="form-group">
                           {{ Form::label('reasonofexit', trans('validation.attributes.crecursos.access.candidate.reasonofexit'), ['class' => 'col-lg-2 control-label']) }}

                           <div class="col-lg-4" >
                           {{ Form::textarea('reasonofexit', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.crecursos.access.candidate.reasonofexit')]) }}
                           </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- End Accordion 5 -->
              </div>
              <!-- End Accordion -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>                  
         li {
                color:#000;
                margin-right:10px;
                padding: 0 2px;
                border-radius:4px;
                -moz-border-radius:4px;
                -webkit-border-radius:4px;
                -o-border-radius:4px;
                border-radius:4px;
                font-weight:.5em;
                font-size:14px;
                cursor:pointer;
            }
            span.dos {
                color: #2b2929;
                border: 1px solid #ff6904;
                background-color:#fff;
                border-radius:4px;
                -moz-border-radius:4px;
                -webkit-border-radius:4px;
                -o-border-radius:4px;
                border-radius:4px;
                font-weight:.5em;
                font-size:12px;
                cursor:pointer;
                }
</style>    