@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.contracts.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ trans('labels.briix.access.contracts.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.briix.access.contracts.management') }}</h3>

            <div class="box-tools pull-right">
                @include('briix.access.includes.partials.header-buttons-contracts')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="contracts-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.briix.access.contracts.table.client_id') }}</th>
                            <th>{{ trans('labels.briix.access.contracts.table.executive_id') }}</th>
                            <th>{{ trans('labels.briix.access.contracts.table.quantity') }}</th>
                            <th>{{ trans('labels.briix.access.contracts.table.typePay') }}</th>
                            <th>{{ trans('labels.briix.access.contracts.table.rate_plan_id') }}</th>

                            <th>{{ trans('labels.briix.access.contracts.table.payment_id') }}</th>
                            <th>{{ trans('labels.briix.access.contracts.table.status') }}</th>
                            <th>{{ trans('labels.briix.access.contracts.table.permissions') }}</th>
                            <th>{{ trans('labels.briix.access.contracts.table.created_at') }}</th>
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
            {!! history()->renderType('Contract') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#contracts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("briix.access.contract.get") }}',
                columns: [
                    {data: 'client', name: 'client'},
                    {data: 'executive_id', name: 'contact'},
                    {data: 'quantity', name: 'email'},
                    {data: 'typePay', name: 'rfc'},
                    {data: 'rate_plan', name: 'rate_plan'},
                    {data: 'payment_id', name: 'contact'},
                    {data: 'status', name: 'email'},
                    {data: 'plans', name: 'plans'},
                    {data: 'created_at', name: 'rfc'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop