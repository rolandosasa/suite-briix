@extends ('briix.layouts.master')

@section ('title', trans('labels.briix.access.enterprises.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ trans('labels.briix.access.enterprises.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.briix.access.enterprises.management') }}</h3>

            <div class="box-tools pull-right">
                @include('briix.access.includes.partials.header-buttons-enterprises')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.briix.access.enterprises.table.enterprise') }}</th>
                            <th>{{ trans('labels.briix.access.enterprises.table.contact') }}</th>
                            <th>{{ trans('labels.briix.access.enterprises.table.email') }}</th>
                            <th>{{ trans('labels.briix.access.enterprises.table.rfc') }}</th>
                            <th>{{ trans('labels.briix.access.enterprises.table.phone') }}</th>
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
            {!! history()->renderType('Enterprise') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#roles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("briix.access.enterprise.get") }}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'contact', name: 'contact'},
                    {data: 'email', name: 'email'},
                    {data: 'rfc', name: 'rfc'},
                    {data: 'phone', name: 'phone'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop