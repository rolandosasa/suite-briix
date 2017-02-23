@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.compettition.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ trans('labels.crecursos.access.compettition.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.crecursos.access.compettition.management') }}</h3>
            <div class="box-tools pull-right">
                @include('crecursos.access.includes.partials.header-buttons-compettition')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="Compettition" class="table table-condensed table-hover">
                    <thead>
                     <tr>
                	   <th>{{ trans('labels.crecursos.access.compettition.table.category') }}</th>
                       <th>{{ trans('labels.crecursos.access.compettition.table.name') }}</th>
                       <th>{{ trans('labels.crecursos.access.compettition.table.type') }}</th>
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
            {!! history()->renderType('compettition') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts-end')
   {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#Compettition').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("crecursos.access.compettition.get") }}',
                columns: [
                    {data: 'category', name: 'category'},
                    {data: 'name', name: 'name'},
                    {data: 'type', name: 'type'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop