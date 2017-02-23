@extends ('crecursos.layouts.master')

@section ('title', trans('labels.crecursos.access.candidate.management') . ' | ' . trans('labels.crecursos.access.candidate.validation'))

@section('page-header')
    <h1>
        {{ trans('labels.crecursos.access.candidate.management') }}
        <small>{{ trans('labels.crecursos.access.candidate.validation') }}</small>
    </h1>
@endsection

@section('content')
          <div class="box box-success"> 
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.crecursos.access.candidate.validation') }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                @include('crecursos.access.Candidate.forms.candidate')
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('crecursos.access.candidate.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->
@stop

@section('after-scripts-end')
    {{ Html::script('js/crecursos/access/Candidates/script.js') }}
@stop