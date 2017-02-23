@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.ratePlans.management') . ' | ' . trans('labels.briix.access.ratePlans.deleted'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.briix.access.ratePlans.management') }}
        <small>{{ trans('labels.briix.access.ratePlans.deleted') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.briix.access.ratePlans.deleted') }}</h3>

            <div class="box-tools pull-right">
                @include('briix.access.includes.partials.header-buttons-ratePlans')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="contracts-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.briix.access.ratePlans.table.description') }}</th>
                            <th>{{ trans('labels.briix.access.ratePlans.table.amount') }}</th>
                            <th>{{ trans('labels.briix.access.ratePlans.table.rankInit') }}</th>
                            <th>{{ trans('labels.briix.access.ratePlans.table.rankEnd') }}</th>
                            <th>{{ trans('labels.briix.access.ratePlans.table.deleted_at') }}</th>
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
                    url: '{{ route("admin.access.ratePlan.get") }}',
                    type: 'get',
                    data: {trashed: true}
                },
                columns: [
                    {data: 'description', name: 'client_id'},
                    {data: 'amount', name: 'executive_id'},
                    {data: 'rankInit', name: 'quantity'},
                    {data: 'rankEnd', name: 'typePay'},
                    {data: 'deleted_at', name: 'deleted_at'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $("body").on("click", "a[name='delete_ratePlan_perm']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ trans('strings.briix.general.are_you_sure') }}",
                    text: "{{ trans('strings.briix.access.ratePlans.delete_contract_confirm') }}",
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

            $("body").on("click", "a[name='restore_ratePlan']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ trans('strings.briix.general.are_you_sure') }}",
                    text: "{{ trans('strings.briix.access.contracts.restore_ratePlan_confirm') }}",
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
