<div class="pull-right mb-10">
  <div class="btn-group">
    <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          {{ trans('menus.crecursos.humanresources.vacancies') }} <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" role="menu">
      <li>{{ link_to_route('crecursos.access.humanresources.index', trans('menus.crecursos.humanresources.all')) }}</li>
      <li class="divider"></li>
      <li>{{ link_to_route('crecursos.access.humanresources.create', trans('menus.crecursos.humanresources.create')) }}</li>
    </ul>
  </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
