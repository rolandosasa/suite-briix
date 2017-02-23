@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.job.management'))

@section('after-styles-end')
    {{ Html::style("css/crecursos/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ trans('labels.crecursos.access.job.management') }}</h1>
@endsection 

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.crecursos.access.job.management') }}</h3>
            <div class="box-tools pull-right">
                @include('crecursos.access.includes.partials.header-buttons-job')
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="job" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                          <th>{{ trans('labels.crecursos.access.job.table.name_jobs') }} </th>
                          <th>{{ trans('labels.crecursos.access.job.table.department') }}</th>
                          <th>{{ trans('labels.crecursos.access.job.table.immediate_boss') }}</th>
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
            {!! history()->renderType('job') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}


    <script>
        $(document).ready(function() {
            $('#job').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("crecursos.access.job.get") }}',
                columns: [
                    {data: 'name_jobs', name: 'name_jobs'},
                    {data: 'department', name: 'department'},
                    {data: 'immediate_boss', name: 'immediate_boss'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop

