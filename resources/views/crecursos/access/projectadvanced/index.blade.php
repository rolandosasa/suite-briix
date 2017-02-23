@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.project-advance.management') . ' | ' . trans('labels.crecursos.access.project-advance.main'))

@section('after-styles-end')  
  {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
	 <h1>
		{{ trans('labels.crecursos.access.project.management') }}
		<small>{{ trans('labels.crecursos.access.project-advance.active') }}</small>
	</h1>
@endsection

@section('content')
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('labels.crecursos.access.project-advance.management') }}</h3>

			<div class="box-tools pull-right">
				@include('crecursos.access.includes.partials.header-buttons-project')
			</div>
		</div><!-- /.box-header -->

		<div class="box-body">
	     <div class="table-responsive">
        <table id="projects-table" class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>{{ trans('labels.crecursos.access.project.table.name') }}</th>
              <th>{{ trans('labels.crecursos.access.project.table.description') }}</th>
              <th>{{ trans('labels.crecursos.access.project.table.contractor') }}</th>
              <th>{{ trans('labels.crecursos.access.project.table.date_init') }}</th>
              <th>{{ trans('labels.crecursos.access.project.table.date_end') }}</th>
              <th>{{ trans('labels.crecursos.access.project.table.amount') }}</th>
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
      $('#projects-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("crecursos.access.project.get") }}',
        columns: [
            {data: 'name_project', name: 'name_project'},
            {data: 'description', name: 'description'},
            {data: 'contractor', name: 'contractor'},
            {data: 'date_init', name: 'date_init'},
            {data: 'date_end', name: 'date_end'},
            {data: 'total_amount', name: 'total_amount'},
            {data: 'actions', name: 'actions'}
        ],
        order: [[3, "asc"]],
        searchDelay: 500
    	});
		});
  </script>
@stop