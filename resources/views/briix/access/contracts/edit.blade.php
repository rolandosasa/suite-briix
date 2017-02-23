@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.contracts.management') . ' | ' . trans('labels.briix.access.contracts.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.briix.access.contracts.management') }}
        <small>{{ trans('labels.briix.access.contracts.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($contract, ['route' => ['briix.access.contract.update', $contract], 'class' => 'form-horizontal', 'contract' => 'form', 'method' => 'PATCH', 'id' => 'edit-contract']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.briix.access.contracts.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('briix.access.includes.partials.header-buttons-contracts')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                @include('briix.access.contracts.forms.cont-edit')
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('briix.access.contract.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}

    <div class="pull-right col-md-3">
       {!!link_to_route('briix.access.contract.union', $title = 'Nuevo', $parameters = $users, $attributes =   ['class'=>'btn btn-success btn-block'])!!}
    </div>
@stop

@section('after-scripts-end')
    {{ Html::script('js/briix/access/users/script.js') }}
@stop