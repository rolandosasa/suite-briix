@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.department.management') . ' | ' . trans('labels.crecursos.access.department.main'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
      {{ trans('labels.crecursos.access.department.management') }}
      <small>{{ trans('labels.crecursos.access.department.active') }}</small>
    </h1>
@endsection

@section('content')
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.crecursos.access.department.management') }}</h3>

      <div class="box-tools pull-right">
        @include('crecursos.access.includes.partials.header-buttons-department')
      </div>
    </div><!-- /.box-header -->

    <div class="box-body">
      <div class="table-responsive">
        <table id="Department" class="table table-condensed table-hover">
          <thead>
            <tr>
            	<th>{{ trans('labels.crecursos.access.department.table.id_department') }}</th>
              <th>{{ trans('labels.crecursos.access.department.table.name_department') }}</th>
              <th>{{ trans('labels.crecursos.access.department.table.area') }}</th>
              <th>{{ trans('labels.crecursos.access.department.table.description') }}</th>
              <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
         </table>
      </div><!--table-responsive-->
    </div><!-- /.box-body -->
	</div><!--box-->

  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
      {!! history()->renderType('Department') !!}
    </div><!-- /.box-body -->
   </div><!--box box-success-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

  <script>
    $(function() {
      $('#Department').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("crecursos.access.department.get") }}',
        columns: [
        	{data: 'id_department', name: 'id_department'},
          {data: 'name_department', name: 'name_department'},
          {data: 'area', name: 'area'},
          {data: 'description', name: 'description'},
          {data: 'actions', name: 'actions'}
        ],
        order: [[3, "asc"]],
        searchDelay: 500
      });
    });
  </script>
@stop