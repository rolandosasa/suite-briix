<div class="pull-right mb-10">
  <div class="btn-group">
    <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          {{ trans('menus.crecursos.job.main') }} <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" role="menu">
      <li class="divider"></li>
      <li>{{ link_to_route('crecursos.access.job.create', trans('menus.crecursos.job.create')) }}</li>
    </ul>
  </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
