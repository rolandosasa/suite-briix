@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.personal.management') . ' | ' . trans('labels.crecursos.access.personal.deleted'))

@section('after-styles-end')  
  {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
	 <h1>
		{{ trans('labels.crecursos.access.personal.management') }}
		<small>{{ trans('labels.crecursos.access.personal.deleted') }}</small>
	</h1>
@endsection

@section('content')
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('labels.crecursos.access.personal.management') }}</h3>

			<div class="box-tools pull-right">
				@include('crecursos.access.includes.partials.header-buttons-personal')
			</div>
		</div><!-- /.box-header -->

		<div class="box-body">
			<div class="table-responsive">
				<table id="personals-table" class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>{{ trans('labels.crecursos.access.personal.table.name') }}</th>
							<th>{{ trans('labels.crecursos.access.personal.table.address') }}</th>
							<th>{{ trans('labels.crecursos.access.personal.table.email') }}</th>
							<th>{{ trans('labels.crecursos.access.personal.table.level-studies') }}</th>
							<th>{{ trans('labels.crecursos.access.personal.table.career') }}</th>
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
      $('#personals-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '{{ route("crecursos.access.personal.get") }}',
          type: 'get',
          data: {status: false, trashed: true}
        },
        columns: [
            {data: 'name', name: 'name'},
            {data: 'address', name: 'address'},
            {data: 'email', name: 'email'},
            {data: 'level_studies', name: 'level_studies'},
            {data: 'career', name: 'career'},
            {data: 'actions', name: 'actions'}
        ],
        order: [[3, "asc"]],
        searchDelay: 500
    	});
		});
  </script>
@stop