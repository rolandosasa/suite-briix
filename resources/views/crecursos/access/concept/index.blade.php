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
      <h3 class="box-title">{{ trans('labels.crecursos.access.concept.estimated') }}</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- /.box-header -->

    <div class="box-body">
      <div class="table-responsive">
        <table id="estimated" class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>{{ trans('labels.crecursos.access.concept.table.personal') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.name') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.january') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.february') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.march') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.april') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.may') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.june') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.july') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.agust') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.september') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.october') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.november') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.december') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($concepts as $concept)      
            <tr>
              <td>
                @if(is_null($concept->personal))
                {{link_to_route ('crecursos.dashboard', $title = 'Sin asignar', $parameters = $concept, $attributes = ['class'=>'popup' ])}}
                @else
                {{link_to_route ('crecursos.dashboard', $title = $concept->personal, $parameters = $concept, $attributes = ['class'=>'popup' ])}}
                @endif
              </td>
              <td>{{$concept->name_concept}}</td>
                <?php $estimateds = array(); ?>
                @foreach($concept->estimateds()->get() as $estimated)
                  <?php 
                    $estimateds[$estimated->month->month] = $estimated->time_programmed;
                    $estimateds[$estimated->month->month.'id'] = $estimated->id;
                  ?>
                @endforeach
                <?php  $table = array_merge($months, $estimateds);?>

                @foreach($months as $month)            
                  @if($table[$month] != $months[$month])
                    <td>
                      {{link_to_route ('crecursos.access.estimated.edit', $title = $table[$month], $parameters = array('estimated' => $table[$month.'id'], 'exect' => true), $attributes = ['class'=>'popup' ])}}
                    </td>
                  @else
                    <td> 
                      {{link_to_route ('crecursos.access.estimated.create', $title = 'N/A', $parameters = array('concept' => $concept, 'month' => $month), $attributes = ['class'=>'popup' ])}}
                    </td>
                  @endif
                @endforeach
            </tr>
            @endforeach
          </tbody>
         </table>
      </div><!--table-responsive-->
    </div><!-- /.box-body -->
	</div><!--box-->

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('labels.crecursos.access.concept.executed') }}</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- /.box-header -->

    <div class="box-body">
      <div class="table-responsive">
        <table id="executed" class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>{{ trans('labels.crecursos.access.concept.table.personal') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.name') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.january') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.february') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.march') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.april') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.may') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.june') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.july') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.agust') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.september') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.october') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.november') }}</th>
              <th>{{ trans('labels.crecursos.access.concept.table.december') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($concepts as $concept)      
            <tr>
              <td>
                @if(is_null($concept->personal))
                  Sin Asignar
                @else
                {{$concept->personal}}
                @endif
              </td>
              <td>{{$concept->name_concept}}</td>
                <?php $estimateds = array(); ?>
                @foreach($concept->estimateds()->get() as $estimated)
                  <?php 
                    $estimateds[$estimated->month->month] = $estimated->time_programmed;
                    $estimateds[$estimated->month->month.'dif'] = $estimated->time_difference;
                    $estimateds[$estimated->month->month.'adv'] = $estimated->advance_percent;
                    $estimateds[$estimated->month->month.'id'] = $estimated->id;
                  ?>
                @endforeach
                <?php  $table = array_merge($months, $estimateds);?>
                @foreach($months as $month)            
                  @if($table[$month] != $months[$month])
                    <td>
                      {{link_to_route ('crecursos.access.estimated.edit', $title = $table[$month.'adv'].'% | ' . $table[$month.'dif'], $parameters = array('estimated' => $table[$month.'id'], 'exect' => false), $attributes = ['class'=>'popup' ])}}
                    </td>
                  @else
                    <td></td>
                  @endif
                @endforeach
            </tr>
            @endforeach
          </tbody>
         </table>
      </div><!--table-responsive-->
    </div><!-- /.box-body -->
  </div><!--box-->

  <div class="box box-success">
    <div class="box-body">
      <div class="pull-left">
        {{ link_to_route('crecursos.access.project.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
      </div><!--pull-left-->

      <div class="pull-right">
        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs', 'onclick' => 'refresh()']) }}
      </div><!--pull-right-->

      <div class="clearfix"></div>
    </div><!-- /.box-body -->
  </div><!--box-->
@stop

@section('after-scripts-end')
  {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
  {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}
  {{ Html::script("js/backend/plugin/popup/jquery.popup.min.js") }}

  <script>
    $(function(){
      // Default usage
      $('.popup').popup({
        width : 600,
        height : 400,
      });

      $('#estimated').DataTable();
      $('#executed').DataTable();
    });

    function refresh(){
      location.reload(true);
    }
  </script>
@stop