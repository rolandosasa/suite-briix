@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.packets.management') . ' | ' . trans('labels.briix.access.packets.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.briix.access.packets.management') }}
        <small>{{ trans('labels.briix.access.packets.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($packet, ['route' => ['briix.access.packet.update', $packet], 'class' => 'form-horizontal', 'packet' => 'form', 'method' => 'PATCH', 'id' => 'edit-packet']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.briix.access.packets.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('briix.access.includes.partials.header-buttons-packets')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.briix.access.packets.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.packets.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('associated-products', trans('validation.attributes.briix.access.packets.associated_products'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        @if ($packet->id != 1)
                            {{-- Administrator has to be set to all --}}
                            {{ Form::select('associated-products', ['all' => 'All', 'custom' => 'Custom'], $packet->all ? 'all' : 'custom', ['class' => 'form-control']) }}
                        @else
                            <span class="label label-success">{{ trans('labels.general.all') }}</span>
                        @endif

                        <div id="available-products" class="hidden mt-20">
                            <div class="row">
                                <div class="col-xs-12">
                                    @if ($products->count())
                                        @foreach ($products as $perm)
                                            <input type="checkbox" name="products[]" value="{{ $perm->id }}" id="perm_{{ $perm->id }}" {{in_array($perm->id, $packet_products) ? 'checked' : ""}} /> <label for="perm_{{ $perm->id }}">{{ $perm->display_name }}</label><br/>
                                        @endforeach
                                    @else
                                        <p>There are no available products.</p>
                                    @endif
                                </div><!--col-lg-6-->
                            </div><!--row-->
                        </div><!--available products-->
                    </div><!--col-lg-3-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('sort', trans('validation.attributes.briix.access.packets.sort'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('sort', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.briix.access.packets.sort')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('briix.access.packet.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts-end')
    {{ Html::script('js/backend/access/products/script.js') }}
@stop
