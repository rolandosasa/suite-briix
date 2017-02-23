				<div class="form-group">
                    {{ Form::label('rfc', trans('validation.attributes.briix.access.enterprises.rfc'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('rfc', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.enterprises.rfc')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.briix.access.enterprises.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.enterprises.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('address', trans('validation.attributes.briix.access.enterprises.address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.enterprises.address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('contact', trans('validation.attributes.briix.access.enterprises.contact'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('contact', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.enterprises.contact')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.briix.access.enterprises.email'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.enterprises.email')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('phone', trans('validation.attributes.briix.access.enterprises.phone'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-4">
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.enterprises.phone')]) }}
                    </div><!--col-lg-10-->
              
                    {{ Form::label('phone2', trans('validation.attributes.briix.access.enterprises.phone2'), ['class' => 'col-lg-2 ']) }}

                    <div class="col-lg-4">
                        {{ Form::text('phone2', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.enterprises.phone2')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="col-lg-4">
                        {!!Form::label('image','Imagen del proyecto:')!!}
                        {!!Form::file('image',['onchange'=>'validapdf(this)'])!!}
                        <output id="list"></output>
                </div><!--col-lg-10-->
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