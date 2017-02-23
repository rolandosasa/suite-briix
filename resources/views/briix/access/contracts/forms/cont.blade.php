<!--Seleccion de la empresa con la que se esta haciendo el contrato-->
	           <div class="form-group">
                    {{ Form::label('enterprise_id', trans('validation.attributes.briix.access.contracts.enterprise_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('enterprise_id', [''=>trans('validation.attributes.briix.access.contracts.enterprise_id_select')] + $enterprises,null,  ['id' => 'enterprise_id','class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


<!--Seleccion del usuario por defecto que tendra acceso al producto, personal previamente registrado y asociado a una empresa-->
                <div class="form-group">
                    {{ Form::label('client_id', trans('validation.attributes.briix.access.contracts.client_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('client_id', [''=>trans('validation.attributes.briix.access.contracts.client_id')],null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group" style="display:none">
                    {{ Form::label('executive_id', trans('validation.attributes.briix.access.contracts.executive_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('executive_id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.contracts.executive_id')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('quantity', trans('validation.attributes.briix.access.contracts.quantity'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.contracts.quantity')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('typePay', trans('validation.attributes.briix.access.contracts.typePay'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('typePay', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.contracts.typePay')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('rate_plan_id', trans('validation.attributes.briix.access.contracts.rate_plan_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('rate_plan_id',[''=>trans('validation.attributes.briix.access.contracts.rate_plan_id')]+ $rate_plans,  null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('payment_id', trans('validation.attributes.briix.access.contracts.payment_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('payment_id', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.contracts.payment_id')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.briix.access.contracts.status'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('status', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.contracts.status')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('database', trans('validation.attributes.briix.access.contracts.database'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('database', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.contracts.database')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('plan', trans('validation.attributes.briix.access.contracts.associated_products'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-3">
                        @if (count($packets) > 0)
                            @foreach($packets as $plan)
                                <input type="checkbox" value="{{ $plan->id }}" name="assignees_packets[]" id="plan-{{ $plan->id }}" /> <label for="plan-{{ $plan->id }}">{{ $plan->name }}</label>
                                <a href="#" data-plan="plan_{{ $plan->id }}" class="show-products-packet small">
                                    (
                                        <span class="show-text">{{ trans('labels.general.show') }}</span>
                                        <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                        {{ trans('labels.briix.access.users.permissions') }}
                                    )
                                </a>
                                <br/>
                                <div class="products-list hidden" data-plan="plan_{{ $plan->id }}">
                                    @if ($plan->all)
                                        {{ trans('labels.briix.access.users.all_permissions') }}<br/><br/>
                                    @else
                                        @if (count($plan->products) > 0)
                                            <blockquote class="small">{{--
                                        --}}@foreach ($plan->products as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                                @endforeach
                                            </blockquote>
                                        @else
                                            {{ trans('labels.briix.access.users.no_permissions') }}<br/><br/>
                                        @endif
                                    @endif
                                </div><!--permission list-->
                            @endforeach
                        @else
                            {{ trans('labels.briix.access.users.no_roles') }}
                        @endif
                    </div><!--col-lg-3-->
                </div><!--form control-->

<!--Metodo para select dependiente de la empresa-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   // $('#enterprise_id').change(function(event){
  $("select[name='enterprise_id']").change(function(){
//alert("Hello! I am an alert box!!");    
      var enterprise_id = $(this).val();

      var token = $("input[name='_token']").val();

      $.ajax({

          url: "<?php echo route('select-client') ?>",

          method: 'POST',

          data: {enterprise_id:enterprise_id, _token:token},

          success: function(data) {
//            alert("Hello! I am an alert box!!"); 
            $("select[name='client_id'").html('');

            $("select[name='client_id'").html(data.options);

          }

      });

  });
});

</script>