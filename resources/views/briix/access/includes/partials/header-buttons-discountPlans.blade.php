<div class="pull-right mb-10">
    
  
    <!--Menu para Manejar los Posibles Planes de descuentos-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.briix.access.discountPlans.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('briix.access.discountPlan.index', trans('menus.briix.access.discountPlans.all')) }}</li>
            
            @permission('manage-enterprises')
                <li>{{ link_to_route('briix.access.discountPlan.create', trans('menus.briix.access.discountPlans.create')) }}</li>
            @endauth
            <li class="divider"></li>
            <li>{{ link_to_route('briix.access.discountPlan.deleted', trans('menus.briix.access.discountPlans.deleted')) }}</li>

        </ul>
    </div><!--btn group-->


</div><!--pull right-->

<div class="clearfix"></div>
