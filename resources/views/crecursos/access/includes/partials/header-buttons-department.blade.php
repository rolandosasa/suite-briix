<div class="pull-right mb-10">
  <div class="btn-group">
    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          {{ trans('menus.crecursos.access.department.main') }} <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" role="menu">
      <li>{{ link_to_route('crecursos.access.department.index', trans('menus.crecursos.access.department.all')) }}</li>
      <li class="divider"></li>
      <li>{{ link_to_route('crecursos.access.department.create', trans('menus.crecursos.access.department.create')) }}</li>
    </ul>
  </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
