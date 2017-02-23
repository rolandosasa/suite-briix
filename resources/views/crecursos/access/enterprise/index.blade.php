@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.enterprise.management') . ' | ' . trans('labels.crecursos.access.enterprise.main'))

@section('after-styles-end')
		{{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
		<h1>
			{{ trans('labels.crecursos.access.enterprise.management') }}
			<small>{{ trans('labels.crecursos.access.enterprise.active') }}</small>
		</h1>
@endsection

@section('content')
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">{{ trans('labels.crecursos.access.enterprise.management') }}</h3>
			<div class="box-tools pull-right">
          @include('crecursos.access.includes.partials.header-buttons-enterprise')
      </div><!--box-tools pull-right-->
		</div><!-- /.box-header -->

		<div class="box-body">
			<div class="table-responsive">
				<table id="enterprise" class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>{{ trans('labels.crecursos.access.enterprise.table.rfc') }}</th>
							<th>{{ trans('labels.crecursos.access.enterprise.table.enterprise') }}</th>
							<th>{{ trans('labels.crecursos.access.enterprise.table.department') }}</th>
							<th>{{ trans('labels.crecursos.access.enterprise.table.email') }}</th>
							<th>{{ trans('labels.crecursos.access.enterprise.table.phone') }}</th>
							<th>{{ trans('labels.crecursos.access.enterprise.table.address') }}</th>
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
					{!! history()->renderType('Enterprise') !!}
		</div><!-- /.box-body -->
	</div><!--box box-success-->
@stop

@section('after-scripts-end')
	{{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
	{{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

	<script>
		$(function() {
			$('#enterprise').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{ route("crecursos.access.enterprise.get") }}',
				columns: [
					{data: 'rfc', name: 'rfc'},
					{data: 'name_enterprise', name: 'name_enterprise'},
					{data: 'departments', name: 'departments'},
					{data: 'email', name: 'email'},
					{data: 'phone', name: 'phone'},
					{data: 'address', name: 'address'},
					{data: 'actions', name: 'actions'}
				],
				order: [[3, "asc"]],
				searchDelay: 500
			});
		});

		$("body").on("click", "a[name='delete_enterprise']", function(e) {
      e.preventDefault();
      var linkURL = $(this).attr("href");

      swal({
          title: "{{ trans('strings.backend.general.are_you_sure') }}",
          text: "{{ trans('strings.crecursos.access.enterprise.delete_confirm') }}",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "{{ trans('strings.backend.general.continue') }}",
          cancelButtonText: "{{ trans('buttons.general.cancel') }}",
          closeOnConfirm: false
      }, function(isConfirmed){
          if (isConfirmed){
              window.location.href = linkURL;
          }
      });
    });
	</script>
@stop