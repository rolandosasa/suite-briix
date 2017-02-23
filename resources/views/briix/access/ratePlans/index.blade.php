@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.ratePlans.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ trans('labels.briix.access.ratePlans.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.briix.access.ratePlans.management') }}</h3>

            <div class="box-tools pull-right">
                @include('briix.access.includes.partials.header-buttons-ratePlans')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="RatePlans-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.briix.access.ratePlans.table.description') }}</th>
                            <th>{{ trans('labels.briix.access.ratePlans.table.product') }}</th>
                            <th>{{ trans('labels.briix.access.ratePlans.table.cost') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.briix.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('RatePlan') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#RatePlans-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("briix.access.ratePlan.get") }}',
                columns: [
                    {data: 'description', name: 'description'},
                    {data: 'product', name: 'product'},
                    {data: 'cost', name: 'cost'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop