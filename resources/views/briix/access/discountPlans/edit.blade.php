@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.discountPlans.management') . ' | ' . trans('labels.briix.access.discountPlans.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.briix.access.discountPlans.management') }}
        <small>{{ trans('labels.briix.access.discountPlans.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($discountPlan, ['route' => ['briix.access.discountPlan.update', $discountPlan], 'class' => 'form-horizontal', 'discountPlan' => 'form', 'method' => 'PATCH', 'id' => 'edit-discountPlan']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.briix.access.discountPlans.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('briix.access.includes.partials.header-buttons-discountPlans')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                @include('briix.access.discountPlans.forms.emp')
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('briix.access.discountPlan.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/access/discountPlans/script.js') }}
@stop