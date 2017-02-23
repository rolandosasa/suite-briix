@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.concept.management') . ' | ' . trans('labels.crecursos.access.concept.main'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/popup/popup.css") }}
@stop

@section('page-header')
    <h1>
      {{ trans('labels.crecursos.access.concept.management') }}
      <small>{{ trans('labels.crecursos.access.concept.active') }}</small>
    </h1>
@endsection

@section('content')
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.crecursos.access.concept.concepts') }}</h3>
    </div><!-- /.box-header -->

    <div class="box-body">
      
      </div><!--table-responsive-->
    </div><!-- /.box-body -->
	</div><!--box-->
@stop

@section('after-scripts-end')
   
@stop