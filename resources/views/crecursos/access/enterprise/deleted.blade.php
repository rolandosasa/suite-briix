@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.enterprises.management') . ' | ' . trans('labels.crecursos.access.enterprises.deleted'))

@section('after-styles-end')
    {{ Html::style("css/crecursos/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.crecursos.access.enterprises.management') }}
        <small>{{ trans('labels.crecursos.access.enterprises.deleted') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.crecursos.access.enterprises.deleted') }}</h3>

            <div class="box-tools pull-right">
                @include('crecursos.access.includes.partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="enterprises-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.crecursos.access.enterprises.table.enterprise') }}</th>
                            <th>{{ trans('labels.crecursos.access.enterprises.table.contact') }}</th>
                            <th>{{ trans('labels.crecursos.access.enterprises.table.email') }}</th>
                            <th>{{ trans('labels.crecursos.access.enterprises.table.rfc') }}</th>
                            <th>{{ trans('labels.crecursos.access.enterprises.table.phone') }}</th>
                            <th>{{ trans('labels.crecursos.access.enterprises.table.created') }}</th>
                            <th>{{ trans('labels.crecursos.access.enterprises.table.last_updated') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/crecursos/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/crecursos/plugin/datatables/dataTables.bootstrap.min.js") }}

	<script>
        $(function() {
            $('#enterprises-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("crecursos.access.enterprise.get") }}',
                    type: 'get',
                    data: {trashed: true}
                },
                columns: [
                    {data: 'rfc', name: 'rfc'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'contact', name: 'contact'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $("body").on("click", "a[name='delete_enterprise_perm']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ trans('strings.crecursos.general.are_you_sure') }}",
                    text: "{{ trans('strings.crecursos.access.enterprises.delete_enterprise_confirm') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.crecursos.general.continue') }}",
                    cancelButtonText: "{{ trans('buttons.general.cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });

            $("body").on("click", "a[name='restore_enterprise']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ trans('strings.crecursos.general.are_you_sure') }}",
                    text: "{{ trans('strings.crecursos.access.enterprises.restore_enterprise_confirm') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.crecursos.general.continue') }}",
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
