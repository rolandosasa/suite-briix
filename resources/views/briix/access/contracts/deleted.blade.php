@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.contracts.management') . ' | ' . trans('labels.briix.access.contracts.deleted'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.briix.access.contracts.management') }}
        <small>{{ trans('labels.briix.access.contracts.deleted') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.briix.access.contracts.deleted') }}</h3>

            <div class="box-tools pull-right">
                @include('briix.access.includes.partials.header-buttons-contracts')
            </div><!--box-tools pull-right-->
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
                            <th>{{ trans('labels.briix.access.contracts.table.deleted_at') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

	<script>
        $(function() {
            $('#contracts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.contract.get") }}',
                    type: 'get',
                    data: {trashed: true}
                },
                columns: [
                    {data: 'client_id', name: 'client_id'},
                    {data: 'executive_id', name: 'executive_id'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'typePay', name: 'typePay'},
                    {data: 'rate_plan_id', name: 'rate_plan_id'},
                    {data: 'payment_id', name: 'payment_id'},
                    {data: 'status', name: 'status'},
                    {data: 'deleted_at', name: 'deleted_at'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $("body").on("click", "a[name='delete_contract_perm']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ trans('strings.briix.general.are_you_sure') }}",
                    text: "{{ trans('strings.briix.access.contracts.delete_contract_confirm') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.briix.general.continue') }}",
                    cancelButtonText: "{{ trans('buttons.general.cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });

            $("body").on("click", "a[name='restore_contract']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ trans('strings.briix.general.are_you_sure') }}",
                    text: "{{ trans('strings.briix.access.contracts.restore_contract_confirm') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.briix.general.continue') }}",
                    cancelButtonText: "{{ trans('buttons.general.cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });
        });
    </script>
@stop
