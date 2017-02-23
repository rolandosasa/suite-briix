<div class="pull-right mb-10">
  <div class="btn-group">
    <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          {{ trans('menus.crecursos.Compettition.main') }} <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" role="menu">
      <li>{{ link_to_route('crecursos.access.compettition.index', trans('menus.crecursos.Compettition.all')) }}</li>
      <li class="divider"></li>
      <li>{{ link_to_route('crecursos.access.compettition.create', trans('menus.crecursos.Compettition.create')) }}</li>
    </ul>
  </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
