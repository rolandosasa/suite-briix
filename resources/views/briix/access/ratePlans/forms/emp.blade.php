				<div class="form-group">
                    {{ Form::label('description', trans('validation.attributes.briix.access.ratePlans.description'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.ratePlans.description')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('product', trans('validation.attributes.briix.access.ratePlans.product'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('product', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.ratePlans.product')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('cost', trans('validation.attributes.briix.access.ratePlans.cost'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('cost', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.ratePlans.cost')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
