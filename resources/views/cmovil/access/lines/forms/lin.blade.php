				        <div class="form-group">
                    {{ Form::label('enterprise_id', trans('validation.attributes.cmovil.access.users.enterprise'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-4">
                        
                        {!!Form::select('enterprise_id', $enterprises,null ,['class' => 'form-control','required' => '','autofocus'=>'', 'placeholder' => trans('validation.attributes.cmovil.access.users.enterprise')]);!!}
                        
                    </div><!--col-lg-10-->
                </div>

                <div class="form-group">
                    {{ Form::label('user_id', trans('validation.attributes.cmovil.access.lines.user_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-4">
                        {{ Form::select('user_id', [''=>trans('validation.attributes.cmovil.access.lines.user_id')],null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

   
              
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.cmovil.access.lines.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-4">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.cmovil.access.lines.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('phone', trans('validation.attributes.cmovil.access.lines.phone'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-4">
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.cmovil.access.lines.phone')]) }}
                    </div><!--col-lg-10-->
              
                   

                    <div class="col-lg-4">
                  
                    </div><!--col-lg-10-->
                </div><!--form control-->

        <style>
          .thumb {
            height: 200px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
        </style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
     // $('#enterprise_id').change(function(event){
   $("select[name='enterprise_id']").change(function(){
       
      var enterprise_id = $(this).val();
       alert(enterprise_id);
      var token = $("input[name='_token']").val();
      //alert(token);
      $.ajax({

          url: "<?php echo route('select-user') ?>",

          method: 'POST',

          data: {enterprise_id:enterprise_id, _token:token},

          success: function(data) {
           alert("Aqui voy"); 
            $("select[name='user_id'").html('');

            $("select[name='user_id'").html(data.options);

          }

      });

    });
  });
</script>