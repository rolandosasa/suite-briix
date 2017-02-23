<div class="pull-right mb-10">
    
  
    <!--Menu para Manejar los Posibles Planes Tarifarios-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.briix.access.ratePlans.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('briix.access.ratePlan.index', trans('menus.briix.access.ratePlans.all')) }}</li>
            
            @permission('manage-enterprises')
                <li>{{ link_to_route('briix.access.ratePlan.create', trans('menus.briix.access.ratePlans.create')) }}</li>
            @endauth
            <li class="divider"></li>
            <li>{{ link_to_route('briix.access.ratePlan.deleted', trans('menus.briix.access.ratePlans.deleted')) }}</li>

        </ul>
    </div><!--btn group-->


</div><!--pull right-->

<div class="clearfix"></div>
