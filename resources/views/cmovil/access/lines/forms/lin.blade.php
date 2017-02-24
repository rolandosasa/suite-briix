				<div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.cmovil.access.lines.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.cmovil.access.lines.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('user_id', trans('validation.attributes.cmovil.access.lines.user_id'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.cmovil.access.lines.user_id')]) }}
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
      <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('image').addEventListener('change', archivo, false);
      </script>