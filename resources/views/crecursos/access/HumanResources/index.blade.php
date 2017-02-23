@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.humanresources.management'))

@section('after-styles-end')
    {{ Html::style("css/crecursos/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ trans('labels.crecursos.access.humanresources.management') }}</h1>
@endsection 

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.crecursos.access.humanresources.management') }}</h3>
            <div class="box-tools pull-right">
                @include('crecursos.access.includes.partials.header-buttons-vacacines')
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="HumanResources" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                          <th>{{ trans('labels.crecursos.access.humanresources.table.date') }} </th>
                          <th>{{ trans('labels.crecursos.access.humanresources.table.applicant_name') }}</th>
                          <th>{{ trans('labels.crecursos.access.humanresources.table.vacant_name') }}</th>
                          <th>{{ trans('labels.general.actions') }}</th>
                            
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.crecursos.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('HumanResources') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}


    <script>
        $(document).ready(function() {
            $('#HumanResources').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("crecursos.access.humanresources.get") }}',
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'applicant_name', name: 'applicant_name'},
                    {data: 'vacant_name', name: 'vacant_name'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

